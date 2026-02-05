@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<h1 class="h3 mb-4">Application Details</h1>

{{-- APPLICATION --}}
<div class="card mb-4">
    <div class="card-header font-weight-bold">Application Info</div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $application->name }}</p>
        <p><strong>Email:</strong> {{ $application->email }}</p>
        <p><strong>Phone:</strong> {{ $application->phone }}</p>
        <p><strong>Experience Level:</strong> {{ $application->experience_level }}</p>
        <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>

        @if($application->cover_letter)
            <p><strong>Cover Letter:</strong><br>{{ $application->cover_letter }}</p>
        @endif

        @if($application->additional_info)
            <p><strong>Additional Info:</strong><br>{{ $application->additional_info }}</p>
        @endif

        <a href="{{ asset('storage/'.$application->resume) }}" target="_blank" class="btn btn-sm btn-outline-primary">
            View Resume
        </a>
    </div>
</div>

{{-- OFFER --}}
<div class="card mb-4">
    <div class="card-header font-weight-bold">Job Offer</div>
    <div class="card-body">
        <p><strong>Title:</strong> {{ $application->offer->title }}</p>
        <p><strong>Location:</strong> {{ $application->offer->location }}</p>
        <p><strong>Role:</strong> {{ $application->offer->role?->name }}</p>
        <p><strong>Service Type:</strong> {{ $application->offer->serviceType?->name }}</p>
        <p><strong>Care Setting:</strong> {{ $application->offer->careSetting?->name }}</p>
        <p><strong>Salary:</strong> {{ $application->offer->salary_range }}</p>
        <p><strong>Description:</strong><br>{{ $application->offer->description }}</p>

        @if($application->offer->qualifications)
            <p><strong>Qualifications:</strong></p>
            <ul>
                @foreach($application->offer->qualifications as $q)
                    <li>{{ $q }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

{{-- STAFF (IF STAFF APPLICATION) --}}
@if($application->staff)
<div class="card mb-4">
    <div class="card-header font-weight-bold">Staff Profile</div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $application->staff->full_name }}</p>
        <p><strong>Email:</strong> {{ $application->staff->email }}</p>
        <p><strong>Phone:</strong> {{ $application->staff->phone }}</p>
        <p><strong>Gender:</strong> {{ ucfirst($application->staff->gender) }}</p>
        <p><strong>Role:</strong> {{ $application->staff->role }}</p>
        <p><strong>Experience:</strong> {{ $application->staff->years_of_experience }} years</p>
        <p><strong>Skills:</strong>
            {{ is_array($application->staff->skills) ? implode(', ', $application->staff->skills) : '' }}
        </p>
        <p><strong>Bio:</strong><br>{{ $application->staff->bio }}</p>
    </div>
</div>
@endif

<a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
    ← Back to Applications
</a>

</div>
@endsection
