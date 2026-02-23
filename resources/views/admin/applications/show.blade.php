@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<h1 class="h3 mb-4">Application Details</h1>

{{-- APPLICATION TYPE BADGE --}}
<div class="mb-3">
    @if($application->staff_id)
        <span class="badge badge-info p-2" title="Healthcare Professional Application">
            <i class="bi bi-person-badge"></i> Staff Application
        </span>
    @elseif($application->candidate_id)
        <span class="badge badge-primary p-2" title="Candidate Job Application">
            <i class="bi bi-person"></i> Job Application (Candidate)
        </span>
    @elseif($application->offer_id)
        <span class="badge badge-secondary p-2" title="Direct Job Application">
            <i class="bi bi-briefcase"></i> Job Application
        </span>
    @endif
</div>

{{-- APPLICATION INFO --}}
<div class="card mb-4">
    <div class="card-header font-weight-bold">
        <i class="bi bi-info-circle"></i> Application Info
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $application->name }}</p>
                <p><strong>Email:</strong> {{ $application->email }}</p>
                <p><strong>Phone:</strong> {{ $application->phone }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Experience Level:</strong> {{ $application->experience_level }}</p>
                <p>
                    <strong>Status:</strong> 
                    <span class="badge badge-{{ $application->status === 'rejected' ? 'danger' : ($application->status === 'shortlisted' ? 'success' : 'warning') }}">
                        {{ ucfirst($application->status) }}
                    </span>
                </p>
                <p><strong>Applied:</strong> {{ $application->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        @if($application->cover_letter)
            <div class="mt-3">
                <strong>Cover Letter:</strong>
                <div class="p-3 bg-light rounded mt-2">
                    {{ nl2br(e($application->cover_letter)) }}
                </div>
            </div>
        @endif

        @if($application->additional_info)
            <div class="mt-3">
                <strong>Additional Info:</strong>
                <div class="p-3 bg-light rounded mt-2">
                    {{ nl2br(e($application->additional_info)) }}
                </div>
            </div>
        @endif

        @if($application->resume && $application->resume !== 'staff-profile')
            <div class="mt-4">
                <a href="{{ asset('storage/'.$application->resume) }}" target="_blank" class="btn btn-outline-primary">
                    <i class="bi bi-file-pdf"></i> View Resume
                </a>
            </div>
        @endif
    </div>
</div>

{{-- JOB OFFER DETAILS (ONLY IF OFFER EXISTS) --}}
@if($application->offer_id && $application->offer)
<div class="card mb-4">
    <div class="card-header font-weight-bold">
        <i class="bi bi-briefcase"></i> Job Offer Details
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Title:</strong> {{ $application->offer->title }}</p>
                <p><strong>Location:</strong> {{ $application->offer->location ?? 'Not specified' }}</p>
                <p><strong>Role:</strong> {{ $application->offer->role?->name ?? 'Not specified' }}</p>
                <p><strong>Service Type:</strong> {{ $application->offer->serviceType?->name ?? 'Not specified' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Care Setting:</strong> {{ $application->offer->careSetting?->name ?? 'Not specified' }}</p>
                <p><strong>Salary:</strong> {{ $application->offer->salary_range ?? 'Not specified' }}</p>
                <p><strong>Posted:</strong> {{ $application->offer->created_at?->format('M d, Y') ?? 'N/A' }}</p>
            </div>
        </div>

        @if($application->offer->description)
            <div class="mt-3">
                <strong>Description:</strong>
                <div class="p-3 bg-light rounded mt-2">
                    {{ nl2br(e($application->offer->description)) }}
                </div>
            </div>
        @endif

        @if(!empty($application->offer->qualifications))
            <div class="mt-3">
                <strong>Qualifications:</strong>
                <ul class="mt-2">
                    @foreach($application->offer->qualifications as $q)
                        <li>{{ $q }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-3">
            <a href="{{ route('admin.offers.show', $application->offer) }}" class="btn btn-sm btn-outline-info">
                <i class="bi bi-eye"></i> View Full Job Offer
            </a>
        </div>
    </div>
</div>
@endif

{{-- STAFF PROFILE (IF STAFF APPLICATION) --}}
@if($application->staff_id && $application->staff)
<div class="card mb-4">
    <div class="card-header font-weight-bold">
        <i class="bi bi-person-badge"></i> Healthcare Professional Profile
        <span class="float-right">
            <span class="badge badge-info">Staff Application</span>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center mb-3">
                @if($application->staff->photo)
                    <img src="{{ asset('storage/'.$application->staff->photo) }}" 
                         alt="{{ $application->staff->full_name }}" 
                         class="img-fluid rounded-circle mb-2" 
                         style="max-width: 150px; max-height: 150px; object-fit: cover;">
                @else
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto" 
                         style="width: 150px; height: 150px;">
                        <i class="bi bi-person" style="font-size: 3rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Full Name:</strong> {{ $application->staff->full_name }}</p>
                        <p><strong>Email:</strong> {{ $application->staff->email }}</p>
                        <p><strong>Phone:</strong> {{ $application->staff->phone }}</p>
                        <p><strong>Gender:</strong> {{ ucfirst($application->staff->gender) }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Role:</strong> {{ $application->staff->role }}</p>
                        <p><strong>Experience:</strong> {{ $application->staff->years_of_experience }} years</p>
                        @if($application->staff->nursing_level)
                            <p><strong>Qualification:</strong> {{ $application->staff->nursing_level }}</p>
                        @endif
                        @if($application->staff->care_specialty)
                            <p><strong>Specialty:</strong> {{ $application->staff->care_specialty }}</p>
                        @endif
                        @if($application->staff->license_number)
                            <p><strong>License/Availability:</strong> {{ $application->staff->license_number }}</p>
                        @endif
                    </div>
                </div>

                @if(!empty($application->staff->skills))
                    <div class="mt-2">
                        <strong>Skills:</strong>
                        <div class="mt-1">
                            @foreach($application->staff->skills as $skill)
                                <span class="badge badge-secondary mr-1">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($application->staff->bio)
                    <div class="mt-3">
                        <strong>Bio/Additional Info:</strong>
                        <div class="p-3 bg-light rounded mt-2">
                            {{ nl2br(e($application->staff->bio)) }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="alert alert-info mt-3">
            <i class="bi bi-info-circle"></i>
            <strong>Note:</strong> This is a staff application from a healthcare professional. 
            To view or manage the full staff profile, please go to <strong>Staff Management</strong> section.
        </div>
    </div>
</div>
@endif

{{-- CANDIDATE INFO (IF CANDIDATE APPLICATION) --}}
@if($application->candidate_id && $application->candidate)
<div class="card mb-4">
    <div class="card-header font-weight-bold">
        <i class="bi bi-person"></i> Candidate Profile
        <span class="float-right">
            <span class="badge badge-primary">Candidate Application</span>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $application->candidate->name ?? $application->name }}</p>
                <p><strong>Email:</strong> {{ $application->candidate->email ?? $application->email }}</p>
                <p><strong>Phone:</strong> {{ $application->candidate->phone ?? $application->phone }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Registered:</strong> {{ $application->candidate->created_at?->format('M d, Y') ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="alert alert-info mt-3">
            <i class="bi bi-info-circle"></i>
            <strong>Note:</strong> This is a job application from a candidate. 
            To view or manage the full candidate profile, please go to <strong>Candidates</strong> section.
        </div>
    </div>
</div>
@endif

{{-- STATUS UPDATE FORM --}}
<div class="card mb-4">
    <div class="card-header font-weight-bold">
        <i class="bi bi-arrow-repeat"></i> Update Status
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('change.status.application', $application) }}" class="form-inline">
            @csrf
            <select name="status" class="form-control mr-2">
                @foreach(['submitted','pending','reviewed','shortlisted','rejected'] as $status)
                    <option value="{{ $status }}" {{ $application->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Update Status
            </button>
        </form>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('admin.applications.index') }}?type={{ request('type') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Applications
    </a>
    
    @if($application->staff_id && $application->staff)
        <span class="btn btn-outline-info ml-2 disabled" title="Go to Staff Management section to view full profile">
            <i class="bi bi-person-badge"></i> View Staff Profile
        </span>
    @elseif($application->candidate_id && $application->candidate)
        <span class="btn btn-outline-info ml-2 disabled" title="Go to Candidates section to view full profile">
            <i class="bi bi-person"></i> View Candidate Profile
        </span>
    @endif
</div>

</div>
@endsection

@push('styles')
<style>
    .badge-info {
        background-color: #36b9cc;
        color: white;
    }
    .badge-primary {
        background-color: #4e73df;
        color: white;
    }
    .badge-secondary {
        background-color: #858796;
        color: white;
    }
    .badge-warning {
        background-color: #f6c23e;
        color: white;
    }
    .badge-success {
        background-color: #1cc88a;
        color: white;
    }
    .badge-danger {
        background-color: #e74a3b;
        color: white;
    }
    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
    }
    .btn.disabled {
        opacity: 0.65;
        cursor: not-allowed;
    }
    [title] {
        cursor: help;
    }
</style>
@endpush