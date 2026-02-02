<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Offer;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    //
    public function create(Offer $offer)
    {
        abort_if(!$offer->is_active, 404);

        return view('user.jobs.apply', compact('offer'));
    }

    /**
     * Store application + candidate
     */
    public function store(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'email'             => ['required', 'email', 'max:255'],
            'phone'             => ['nullable', 'string', 'max:20'],
            'profession'        => ['nullable', 'string', 'max:255'],
            'experience_level'  => ['required', 'string', 'max:255'],
            'resume'            => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'linkedin_profile'  => ['nullable', 'url'],
            'portfolio_url'     => ['nullable', 'url'],
            'cover_letter'      => ['nullable', 'string'],
            'additional_info'   => ['nullable', 'string'],
        ]);

        /**
         * Create or fetch candidate
         */
        $candidate = Candidate::firstOrCreate(
            ['email' => $data['email']],
            [
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'phone'      => $data['phone'] ?? null,
                'profession' => $data['profession'] ?? null,
            ]
        );

        /**
         * Upload CV
         */
        $cvPath = $request->file('resume')->store('cvs', 'public');

        // Update CV if missing
        if (!$candidate->cv_path) {
            $candidate->update(['cv_path' => $cvPath]);
        }

        /**
         * Create application
         */
        $application = Application::create([
        'offer_id'         => $offer->id,
        'candidate_id'     => $candidate->id,
        'name'             => $candidate->first_name . ' ' . $candidate->last_name,
        'email'            => $candidate->email,
        'phone'            => $candidate->phone,
        'resume'           => $cvPath,
        'linkedin_profile' => $data['linkedin_profile'] ?? null,
        'portfolio_url'    => $data['portfolio_url'] ?? null,
        'experience_level' => $data['experience_level'],
        'cover_letter'     => $data['cover_letter'] ?? null,
        'additional_info'  => $data['additional_info'] ?? null,
        'status'           => 'submitted',
        'opened_at'        => now(),
    ]);

    $emailSent = $this->notifyAdminOfApplication($application);


        return redirect()
    ->route('jobs.show', $offer->id)
    ->with(
        'success',
        $emailSent
            ? 'Your application has been submitted successfully.'
            : 'Your application was submitted successfully. Our team has been notified and will review it shortly.'
    );

    }

    protected function notifyAdminOfApplication(Application $application): bool
{
    try {
        $to = 'admin@tobesthealth.com';
        $subject = 'New Job Application Received';

        $message = "
A new job application has been submitted.

Job Title: {$application->offer->title}
Applicant Name: {$application->name}
Email: {$application->email}
Phone: {$application->phone}
Experience Level: {$application->experience_level}

Login to admin panel to view full details.
";

        $headers = implode("\r\n", [
            'From: TobestHealth <no-reply@tobesthealth.com>',
            'Reply-To: no-reply@tobesthealth.com',
            'Content-Type: text/plain; charset=UTF-8',
        ]);

        return mail($to, $subject, $message, $headers);

    } catch (\Throwable $e) {
        // Fail silently — log only if you want
        logger()->warning('Admin email failed', [
            'error' => $e->getMessage(),
            'application_id' => $application->id,
        ]);

        return false;
    }
}


}
