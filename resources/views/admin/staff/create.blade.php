@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add New Staff Member</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- Full Name --}}
            <div class="col-md-6 mb-3">
                <label>Full Name *</label>
                <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
            </div>

            {{-- Email --}}
            <div class="col-md-6 mb-3">
                <label>Email *</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            {{-- Phone --}}
            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            {{-- Gender --}}
            <div class="col-md-6 mb-3">
                <label>Gender *</label>
                <select name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="male" @selected(old('gender') === 'male')>Male</option>
                    <option value="female" @selected(old('gender') === 'female')>Female</option>
                    <option value="other" @selected(old('gender') === 'other')>Other</option>
                </select>
            </div>

            {{-- Role --}}
            <div class="col-md-6 mb-3">
                <label>Role *</label>
                <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" @selected(old('role') === $role->name)>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nursing Level --}}
            <div class="col-md-6 mb-3">
                <label>Nursing Level</label>
                <input type="text" name="nursing_level" class="form-control" value="{{ old('nursing_level') }}">
            </div>

            {{-- Years of Experience --}}
            <div class="col-md-6 mb-3">
                <label>Years of Experience</label>
                <input type="number" name="years_of_experience" class="form-control" min="0" value="{{ old('years_of_experience') }}">
            </div>

            {{-- Care Specialty --}}
            <div class="col-md-6 mb-3">
                <label>Care Specialty</label>
                <select name="care_specialty" class="form-control">
                    <option value="">Select Care Specialty</option>
                    @foreach($careSettings as $setting)
                        <option value="{{ $setting->name }}" @selected(old('care_specialty') === $setting->name)>
                            {{ $setting->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- License Number --}}
            <div class="col-md-6 mb-3">
                <label>License Number</label>
                <input type="text" name="license_number" class="form-control" value="{{ old('license_number') }}">
            </div>

            {{-- License Verified --}}
            <div class="col-md-6 mb-3">
                <input type="hidden" name="license_verified" value="0">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" name="license_verified" value="1" @checked(old('license_verified'))>
                    <label class="form-check-label">License Verified</label>
                </div>
            </div>

            {{-- Skills --}}
            <div class="col-md-12 mb-3">
                <label>Skills</label>
                <div id="skills-wrapper">
                    <div class="input-group mb-2">
                        <input type="text" name="skills[]" class="form-control" placeholder="Enter a skill">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-success add-skill">+</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Photo --}}
            <div class="col-md-6 mb-3">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control-file">
            </div>

            {{-- Availability --}}
            <div class="col-md-6 mb-3">
                <label>Availability Type</label>
                <select name="availability_type" class="form-control">
                    <option value="">Select Availability</option>
                    <option value="On-site" @selected(old('availability_type') === 'On-site')>On-site</option>
                    <option value="Remote" @selected(old('availability_type') === 'Remote')>Remote</option>
                    <option value="Hybrid" @selected(old('availability_type') === 'Hybrid')>Hybrid</option>
                </select>
            </div>

            {{-- Status --}}
            <div class="col-md-6 mb-3">
                <input type="hidden" name="is_active" value="0">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                    <label class="form-check-label">Active</label>
                </div>
            </div>

            {{-- Featured --}}
            <div class="col-md-6 mb-3">
                <input type="hidden" name="is_featured" value="0">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1">
                    <label class="form-check-label">Featured</label>
                </div>
            </div>

            {{-- Bio --}}
            <div class="col-md-12 mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control" rows="4">{{ old('bio') }}</textarea>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Save Staff Member
        </button>
    </form>
</div>

<script>
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('add-skill')) {
        const wrapper = document.getElementById('skills-wrapper');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="skills[]" class="form-control" placeholder="Enter a skill">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-skill">&times;</button>
            </div>
        `;
        wrapper.appendChild(div);
    }

    if (e.target.classList.contains('remove-skill')) {
        e.target.closest('.input-group').remove();
    }
});
</script>

@endsection
