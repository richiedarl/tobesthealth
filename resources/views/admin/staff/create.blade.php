@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add New Staff Member</h1>

    {{-- Validation Errors --}}
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
                    <option value="">-- Select Gender --</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            {{-- Role --}}
            <div class="col-md-6 mb-3">
                <label>Role *</label>
                <input type="text" name="role" class="form-control" value="{{ old('role') }}" required>
            </div>

            {{-- Nursing Level --}}
            <div class="col-md-6 mb-3">
                <label>Nursing Level</label>
                <input type="text" name="nursing_level" class="form-control" value="{{ old('nursing_level') }}">
            </div>

            {{-- Years of Experience --}}
            <div class="col-md-6 mb-3">
                <label>Years of Experience</label>
                <input type="number" name="years_of_experience" class="form-control" value="{{ old('years_of_experience') }}" min="0">
            </div>

            {{-- Care Specialty --}}
            <div class="col-md-6 mb-3">
                <label>Care Specialty</label>
                <input type="text" name="care_specialty" class="form-control" value="{{ old('care_specialty') }}">
            </div>

            {{-- License Number --}}
            <div class="col-md-6 mb-3">
                <label>License Number</label>
                <input type="text" name="license_number" class="form-control" value="{{ old('license_number') }}">
            </div>

            {{-- License Verified --}}
            <div class="col-md-6 mb-3 d-flex align-items-center">
                <input type="hidden" name="license_verified" value="0">
                <input type="checkbox" name="license_verified" value="1" class="form-check-input" {{ old('license_verified') ? 'checked' : '' }}>
                <label class="ml-2">License Verified</label>
            </div>

            {{-- Skills --}}
            <div class="col-md-12 mb-3">
                <label>Skills</label>
                <div id="skills-wrapper">
                    @if(old('skills'))
                        @foreach(old('skills') as $skill)
                        <div class="input-group mb-2">
                            <input type="text" name="skills[]" class="form-control" value="{{ $skill }}" placeholder="Enter a skill">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-skill">&times;</button>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="input-group mb-2">
                            <input type="text" name="skills[]" class="form-control" placeholder="Enter a skill">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success add-skill">+</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Photo --}}
            <div class="col-md-6 mb-3">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control-file">
            </div>

            {{-- Availability --}}
            <div class="col-md-6 mb-3">
                <input type="hidden" name="is_available" value="0">
                <input type="checkbox" name="is_available" value="1" class="form-check-input" {{ old('is_available', true) ? 'checked' : '' }}>
                <label class="ml-2">Available</label>
            </div>

            <div class="col-md-6 mb-3">
                <label>Availability Type</label>
                <input type="text" name="availability_type" class="form-control" value="{{ old('availability_type') }}">
            </div>

            {{-- Active --}}
            <div class="col-md-6 mb-3">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="ml-2">Active</label>
            </div>

            {{-- Featured --}}
            <div class="col-md-6 mb-3">
                <input type="hidden" name="is_featured" value="0">
                <input type="checkbox" name="is_featured" value="1" class="form-check-input" {{ old('is_featured') ? 'checked' : '' }}>
                <label class="ml-2">Featured</label>
            </div>

            {{-- Bio --}}
            <div class="col-md-12 mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control" rows="4">{{ old('bio') }}</textarea>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Save Staff Member</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('skills-wrapper');

    // Add skill
    wrapper.addEventListener('click', function(e) {
        if(e.target.classList.contains('add-skill')) {
            const div = document.createElement('div');
            div.classList.add('input-group', 'mb-2');
            div.innerHTML = `
                <input type="text" name="skills[]" class="form-control" placeholder="Enter a skill">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-skill">&times;</button>
                </div>
            `;
            wrapper.appendChild(div);
        }

        // Remove skill
        if(e.target.classList.contains('remove-skill')) {
            e.target.closest('.input-group').remove();
        }
    });
});
</script>
@endsection
