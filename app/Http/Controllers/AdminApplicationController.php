<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\ApplicationStatusUpdatedMail;

class AdminApplicationController extends Controller
{
    /**
     * List applications with filters
     */
    public function index(Request $request)
    {
        $type = $request->get('type');

        $applications = Application::with(['offer', 'candidate', 'staff'])
            ->when($type === 'staff', fn ($q) => $q->whereNotNull('staff_id'))
            ->when($type === 'job', fn ($q) => $q->whereNotNull('candidate_id'))
            ->latest()
            ->paginate(20);

        return view('admin.applications.index', compact('applications', 'type'));
    }

    /**
     * Show application details + mark opened
     */
    public function show(Application $application)
    {
        if (!$application->opened_at) {
            $application->update([
                'opened_at' => now(),
            ]);
        }

        $application->load([
            'offer.role',
            'offer.serviceType',
            'offer.careSetting',
            'candidate',
            'staff',
        ]);

        return view('admin.applications.show', compact('application'));
    }

    /**
     * Update status + notify applicant
     */
    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => ['required', 'in:submitted,pending,reviewed,shortlisted,rejected'],
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        // Send email (FAIL SAFE)
        try {
            Mail::to($application->email)
                ->send(new ApplicationStatusUpdatedMail($application));
        } catch (\Throwable $e) {
            logger()->warning('Application status email failed', [
                'application_id' => $application->id,
                'error' => $e->getMessage(),
            ]);
        }

        return back()->with('success', 'Application status updated.');
    }
}
