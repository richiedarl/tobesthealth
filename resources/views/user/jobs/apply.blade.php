@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg">
                <div class="card-body p-5">

                    <h2 class="mb-3">
                        Apply for {{ $offer->title }}
                    </h2>

                    <p class="text-muted mb-4">
                        {{ $offer->location }} • {{ $offer->role->name ?? 'Healthcare Role' }}
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('applications.store', $offer->id) }}"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>First Name</label>
                                <input name="first_name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Last Name</label>
                                <input name="last_name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <input name="phone" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Profession</label>
                                <input name="profession" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Experience Level</label>
                                <select name="experience_level" class="form-control" required>
                                    <option value="">Select</option>
                                    <option>Entry Level</option>
                                    <option>Mid Level</option>
                                    <option>Senior Level</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Resume / CV</label>
                                <input type="file" name="resume" class="form-control" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>LinkedIn Profile (optional)</label>
                                <input name="linkedin_profile" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Portfolio URL (optional)</label>
                                <input name="portfolio_url" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Cover Letter</label>
                                <textarea name="cover_letter" rows="4" class="form-control"></textarea>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label>Additional Information</label>
                                <textarea name="additional_info" rows="3" class="form-control"></textarea>
                            </div>

                        </div>

                        <button class="btn btn-primary btn-lg btn-block">
                            Submit Application
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection
