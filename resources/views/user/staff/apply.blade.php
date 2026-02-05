@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="mb-3">Request {{ $staff->full_name }}</h2>
    <p class="text-muted">For job: <strong>{{ $offer->title }}</strong></p>

    <form method="POST" action="{{ route('staff.apply.store', [$staff->id, $offer->id]) }}">
        @csrf

        <div class="form-group mb-3">
            <label>Organization / Contact Name</label>
            <input name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Phone</label>
            <input name="phone" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Experience Level Needed</label>
            <select name="experience_level" class="form-control" required>
                <option value="">Select</option>
                <option>Junior</option>
                <option>Mid</option>
                <option>Senior</option>
                <option>Expert</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Additional Info</label>
            <textarea name="additional_info" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group mb-4">
            <label>Cover Letter (Optional)</label>
            <textarea name="cover_letter" class="form-control" rows="4"></textarea>
        </div>

        <button class="btn btn-primary">
            Submit Request
        </button>
    </form>

</div>
@endsection
