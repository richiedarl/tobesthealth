@extends('layouts.app')

@section('content')
<section class="section py-5">

    <!-- Page Title -->
    <div class="container mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Available Job Openings</h1>
            <nav class="breadcrumbs">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Jobs</li>
                </ol>
            </nav>
        </div>
    </div>
<form method="GET" action="{{ route('user.jobs.index') }}" class="mb-5">

    <div
        class="card shadow-sm border-2"
        style="border-radius: 18px; border-color: var(--bs-primary);"
    >
        <div class="card-body p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="fw-semibold text-primary mb-0">
                    Find a Job That Fits You
                </h5>

                @if(request()->query())
                    <span class="badge rounded-pill bg-primary-subtle text-primary">
                        Filtered Results
                    </span>
                @endif
            </div>

            <div class="row g-4">

                {{-- Role --}}
                <div class="col-lg-3 col-md-4">
                    <label class="form-label small text-muted">Role</label>
                    <select name="role_id" class="form-select form-select-lg">
                        <option value="">All Roles</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected(request('role_id') == $role->id)>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Service Type --}}
                <div class="col-lg-3 col-md-4">
                    <label class="form-label small text-muted">Service Type</label>
                    <select name="service_type_id" class="form-select form-select-lg">
                        <option value="">All Types</option>
                        @foreach ($serviceTypes as $type)
                            <option value="{{ $type->id }}" @selected(request('service_type_id') == $type->id)>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Care Setting --}}
                <div class="col-lg-3 col-md-4">
                    <label class="form-label small text-muted">Care Setting</label>
                    <select name="care_setting_id" class="form-select form-select-lg">
                        <option value="">All Settings</option>
                        @foreach ($careSettings as $setting)
                            <option value="{{ $setting->id }}" @selected(request('care_setting_id') == $setting->id)>
                                {{ $setting->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Location --}}
                <div class="col-lg-3 col-md-4">
                    <label class="form-label small text-muted">Location</label>
                    <select name="location" class="form-select form-select-lg">
                        <option value="">All Locations</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}" @selected(request('location') === $location)>
                                {{ $location }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Salary --}}
                <div class="col-lg-3 col-md-4">
                    <label class="form-label small text-muted">Salary Range</label>
                    <select name="salary_range" class="form-select form-select-lg">
                        <option value="">Any</option>
                        <option value="0-30000" @selected(request('salary_range') === '0-30000')>
                            £0 – £30k
                        </option>
                        <option value="30000-50000" @selected(request('salary_range') === '30000-50000')>
                            £30k – £50k
                        </option>
                        <option value="50000-100000" @selected(request('salary_range') === '50000-100000')>
                            £50k+
                        </option>
                    </select>
                </div>

                {{-- Actions --}}
                <div class="col-lg-3 col-md-4 d-flex align-items-end gap-2">
                    <button class="btn btn-primary btn-lg w-100">
                        Filter Jobs
                    </button>

                    @if(request()->query())
                        <a href="{{ route('user.jobs.index') }}"
                           class="btn btn-outline-secondary btn-lg w-100">
                            Reset
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </div>

</form>





    <!-- Jobs List -->
    <div class="container">
        <div class="row g-4">

            @forelse ($offers as $offer)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm">

                        <div class="card-body">
                            <h5 class="card-title">{{ $offer->title }}</h5>

                            <p class="text-muted mb-2">
                                <i class="bi bi-geo-alt"></i>
                                {{ $offer->location ?? 'Location not specified' }}
                            </p>

                            <p class="card-text">
                                {{ Str::limit($offer->description, 120) }}
                            </p>

                            <span class="badge bg-primary">
                                {{ $offer->employment_type ?? 'Full Time' }}
                            </span>
                        </div>

                        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Posted {{ $offer->created_at->diffForHumans() }}
                            </small>

                            <a href="{{ route('jobs.show', $offer->id) }}" class="btn btn-sm btn-outline-primary">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted mb-0">No job openings available at the moment.</p>
                </div>
            @endforelse
@if($offers->count() === 0)
    <div class="alert alert-info mt-4">
        No job offers matched your filters.
        <a href="{{ route('user.jobs.index') }}" class="alert-link">Clear filters</a>
        to see all available roles.
    </div>
@endif

        </div>

        <!-- Pagination -->
        @if(method_exists($offers, 'links'))
            <div class="mt-5 d-flex justify-content-center">
                {{ $offers->links() }}
            </div>
        @endif
    </div>

</section>
@endsection
