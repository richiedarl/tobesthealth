@extends('layouts.app')

@section('content')
<style>
:root {
    --brand-green: #83A121;
    --brand-blue: #1992C9;
}

.job-hero {
    background: linear-gradient(135deg, var(--brand-blue), var(--brand-green));
}

.job-hero h1,
.job-hero p {
    color: #fff;
}

.glass-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 12px 30px rgba(0,0,0,.08);
    border: none;
}

.section-title {
    color: var(--brand-blue);
    font-weight: 600;
}

.badge-active {
    background: var(--brand-green);
}

.badge-closed {
    background: #adb5bd;
}

.apply-btn {
    background: linear-gradient(135deg, var(--brand-green), var(--brand-blue));
    border: none;
}

.apply-btn:disabled {
    background: #ced4da;
    cursor: not-allowed;
}
</style>

<div class="job-hero py-5 mb-5">
    <div class="container">

        <span class="badge badge-light px-3 py-2 mb-3">
            {{ $offer->role->name ?? 'Healthcare Role' }}
        </span>

        <h1 class="display-5 font-weight-bold mt-3">
            {{ $offer->title }}
        </h1>

        <p class="lead mt-3">
            <i class="fas fa-map-marker-alt"></i>
            {{ $offer->location }}
        </p>

        @if($offer->salary_range)
            <h4 class="mt-3">
                💰 {{ $offer->salary_range }}
            </h4>
        @endif

    </div>
</div>

<div class="container">
    <div class="row">

        {{-- MAIN CONTENT --}}
        <div class="col-lg-8">

            <div class="glass-card p-4 mb-4">
                <h4 class="section-title mb-3">Job Description</h4>
                <p class="text-muted">
                    {!! nl2br(e($offer->description)) !!}
                </p>
            </div>

            @if($offer->requirements)
            <div class="glass-card p-4 mb-4">
                <h4 class="section-title mb-3">Requirements</h4>
                <p class="text-muted">
                    {!! nl2br(e($offer->requirements)) !!}
                </p>
            </div>
            @endif

            @if(!empty($offer->qualifications))
            <div class="glass-card p-4 mb-4">
                <h4 class="section-title mb-3">Qualifications</h4>
                <ul class="list-group list-group-flush">
                    @foreach($offer->qualifications as $qualification)
                        <li class="list-group-item border-0 px-0">
                            ✔ {{ $qualification }}
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-4">

            <div class="glass-card p-4 sticky-top" style="top: 90px;">

                <h5 class="section-title mb-3">Job Overview</h5>

                <ul class="list-unstyled text-muted mb-4">
                    <li class="mb-2">
                        <strong>Role:</strong>
                        {{ $offer->role->name ?? '—' }}
                    </li>
                    <li class="mb-2">
                        <strong>Service Type:</strong>
                        {{ $offer->serviceType->name ?? '—' }}
                    </li>
                    <li class="mb-2">
                        <strong>Care Setting:</strong>
                        {{ $offer->careSetting->name ?? '—' }}
                    </li>
                    <li class="mb-2">
                        <strong>Status:</strong>
                        <span class="badge {{ $offer->is_active ? 'badge-active' : 'badge-closed' }}">
                            {{ $offer->is_active ? 'Active' : 'Closed' }}
                        </span>
                    </li>
                </ul>

                @if($offer->is_active)
                    <a href="{{ route('applications.create', $offer->id) }}"
                       class="btn apply-btn btn-lg btn-block text-white">
                        Apply Now
                    </a>
                @else
                    <button class="btn btn-lg btn-block apply-btn text-white" disabled>
                        Applications Closed
                    </button>
                @endif

            </div>

        </div>

    </div>
</div>
@endsection
