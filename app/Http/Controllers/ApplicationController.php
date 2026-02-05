<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Offer;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminApplicationNotification;

class ApplicationController extends Controller
{
    /**
     * Show apply page
     */
    public function create(Offer $offer)
    {
        abort_if(!$offer->is_active, 404);

        return view('user.jobs.apply', compact('offer'));
    }

    /**
     * Store application (candidate OR staff)
     */
    public function store(Request $request, Offer $offer)
    {
        abort_if(!$offer->is_active, 404);

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
            'staff_id' => ['nullable', 'exists:staff,id'],

        ]);

        /**
         * Detect staff application
         */
        $staffId = $request->input('staff_id'); // nullable


        /**
         * Create or fetch candidate (even for staff, for unified admin view)
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
         * Prevent duplicate application
         */
        $duplicate = Application::where('offer_id', $offer->id)
            ->when($staffId, fn ($q) => $q->where('staff_id', $staffId))
            ->when(!$staffId, fn ($q) => $q->where('candidate_id', $candidate->id))
            ->exists();

        if ($duplicate) {
            return back()->with(
                'success',
                'You have already applied for this job. Our team will review your application.'
            );
        }

        /**
         * Upload CV
         */
        $cvPath = $request->file('resume')->store('cvs', 'public');

        if (!$candidate->cv_path) {
            $candidate->update(['cv_path' => $cvPath]);
        }

        /**
         * Create application
         */
        $application = Application::create([
            'offer_id'         => $offer->id,
            'candidate_id'     => $staffId ? null : $candidate->id,
            'staff_id'         => $staffId,
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
            'opened_at'        => null,
        ]);

        /**
         * Notify admin (fail-safe)
         */
        $emailSent = $this->notifyAdminOfApplication($application);

        return redirect()
            ->route('jobs.show', $offer->id)
            ->with(
                'success',
                $emailSent
                    ? 'Your application has been submitted successfully.'
                    : 'Your application was submitted successfully. Our team will review it shortly.'
            );
    }

    /**
     * Notify admin of new application
     */
    protected function notifyAdminOfApplication(Application $application): bool
    {
        try {
            Mail::to('admin@tobesthealth.com')
                ->send(new AdminApplicationNotification($application));

            return true;
        } catch (\Throwable $e) {
            logger()->warning('Admin application email failed', [
                'application_id' => $application->id,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    public function createStaff(Staff $staff, Offer $offer)
{
    abort_if(!$offer->is_active, 404);

    return view('user.staff.apply', compact('staff', 'offer'));
}

public function storeStaff(Request $request, Staff $staff, Offer $offer)
{
    // Prevent duplicate staff application per offer
    $exists = Application::where('offer_id', $offer->id)
        ->where('staff_id', $staff->id)
        ->exists();

    if ($exists) {
        return back()->with('error', 'An application already exists for this staff on this offer.');
    }

    $data = $request->validate([
        'name'             => ['required', 'string', 'max:255'],
        'email'            => ['required', 'email', 'max:255'],
        'phone'            => ['required', 'string', 'max:20'],
        'experience_level' => ['required', 'string', 'max:255'],
        'additional_info'  => ['nullable', 'string'],
        'cover_letter'     => ['nullable', 'string'],
    ]);

    $application = Application::create([
        'offer_id'         => $offer->id,
        'staff_id'         => $staff->id,
        'candidate_id'     => null,

        'name'             => $data['name'],
        'email'            => $data['email'],
        'phone'            => $data['phone'],
        'experience_level' => $data['experience_level'],
        'additional_info'  => $data['additional_info'] ?? null,
        'cover_letter'     => $data['cover_letter'] ?? null,

        // staff already has CV
        'resume'           => $staff->photo ?? 'staff-profile',

        'status'           => 'submitted',
        'opened_at'        => null,
    ]);

    $this->notifyAdminOfApplication($application);

    return redirect()
        ->route('jobs.show', $offer->id)
        ->with('success', 'Your staff request has been submitted successfully.');
}

}
