@extends('layouts.app')

@section('content')
<style>
.job-hero {
    background: linear-gradient(120deg, #007bff, #004085);
}
.job-hero h1,
.job-hero p {
    color: #fff;
}
</style>

<div class="job-hero py-5 mb-5">
    <div class="container text-white">
        <span class="badge badge-light mb-2">
            {{ $offer->role->name ?? 'Healthcare Role' }}
        </span>

        <h1 class="display-5 font-weight-bold mt-2">
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

            <div class="card shadow-sm mb-4">
                <div class="card-body">

                    <h4 class="mb-3">Job Description</h4>
                    <p class="text-muted">
                        {!! nl2br(e($offer->description)) !!}
                    </p>

                </div>
            </div>

            @if($offer->requirements)
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Requirements</h4>
                    <p class="text-muted">
                        {!! nl2br(e($offer->requirements)) !!}
                    </p>
                </div>
            </div>
            @endif

            @if(!empty($offer->qualifications))
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Qualifications</h4>
                    <ul class="list-group list-group-flush">
                        @foreach($offer->qualifications as $qualification)
                            <li class="list-group-item">
                                ✔ {{ $qualification }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-4">

            <div class="card shadow-sm mb-4 sticky-top" style="top: 90px;">
                <div class="card-body">

                    <h5 class="mb-3">Job Overview</h5>

                    <ul class="list-unstyled text-muted">
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
                            <span class="badge badge-{{ $offer->is_active ? 'success' : 'secondary' }}">
                                {{ $offer->is_active ? 'Active' : 'Closed' }}
                            </span>
                        </li>
                    </ul>

                    <hr>

                    <a href="{{ route('applications.create', $offer->id) }}"
                       class="btn btn-primary btn-block btn-lg">
                        Apply Now
                    </a>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection


