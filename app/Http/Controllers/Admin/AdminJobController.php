<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Role;
use App\Models\ServiceType;
use App\Models\CareSetting;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(['role', 'serviceType', 'careSetting'])
            ->latest()
            ->paginate(20);

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create', [
            'roles' => Role::orderBy('name')->get(),
            'serviceTypes' => ServiceType::orderBy('name')->get(),
            'careSettings' => CareSetting::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateJob($request);

        Job::create($validated);

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Job posted successfully.');
    }

    public function show(Job $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', [
            'job' => $job,
            'roles' => Role::orderBy('name')->get(),
            'serviceTypes' => ServiceType::orderBy('name')->get(),
            'careSettings' => CareSetting::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Job $job)
    {
        $validated = $this->validateJob($request);

        $job->update($validated);

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Job deleted successfully.');
    }

    protected function validateJob(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],

            'role_id' => ['required', 'exists:roles,id'],
            'service_type_id' => ['required', 'exists:service_types,id'],
            'care_setting_id' => ['required', 'exists:care_settings,id'],

            'salary_range' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'requirements' => ['nullable', 'string'],

            'is_active' => ['boolean'],
        ]);
    }
}