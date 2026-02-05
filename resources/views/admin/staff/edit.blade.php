@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-semibold text-dark">
            <i class="bi bi-person-badge me-2 text-primary"></i>
            Edit Staff Member
        </h1>
        <a href="{{ route('admin.staff.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger rounded-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card shadow-sm border-2 rounded-4"
             style="border-color: rgba(25,135,84,.25);">

            <div class="card-body p-4">

                <div class="row g-4">

                    {{-- Full Name --}}
                    <div class="col-md-6">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="full_name"
                               class="form-control"
                               value="{{ old('full_name', $staff->full_name) }}" required>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email"
                               class="form-control"
                               value="{{ old('email', $staff->email) }}" required>
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone"
                               class="form-control"
                               value="{{ old('phone', $staff->phone) }}">
                    </div>

                    {{-- Gender --}}
                    <div class="col-md-6">
                        <label class="form-label">Gender *</label>
                        <select name="gender" class="form-select" required>
                            <option value="">Select gender</option>
                            @foreach(['male','female','other'] as $gender)
                                <option value="{{ $gender }}"
                                    @selected(old('gender', $staff->gender) === $gender)>
                                    {{ ucfirst($gender) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Role --}}
                    <div class="col-md-6">
                        <label class="form-label">Role *</label>
                        <select name="role" class="form-select" required>
                            <option value="">Select role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}"
                                    @selected(old('role', $staff->role) === $role->name)>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Nursing Level --}}
                    <div class="col-md-6">
                        <label class="form-label">Nursing Level</label>
                        <input type="text" name="nursing_level"
                               class="form-control"
                               value="{{ old('nursing_level', $staff->nursing_level) }}">
                    </div>

                    {{-- Experience --}}
                    <div class="col-md-6">
                        <label class="form-label">Years of Experience</label>
                        <input type="number" name="years_of_experience"
                               class="form-control"
                               min="0"
                               value="{{ old('years_of_experience', $staff->years_of_experience) }}">
                    </div>

                    {{-- Care Specialty --}}
                    <div class="col-md-6">
                        <label class="form-label">Care Specialty</label>
                        <select name="care_specialty" class="form-select">
                            <option value="">Select specialty</option>
                            @foreach($careSettings as $setting)
                                <option value="{{ $setting->name }}"
                                    @selected(old('care_specialty', $staff->care_specialty) === $setting->name)>
                                    {{ $setting->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- License --}}
                    <div class="col-md-6">
                        <label class="form-label">License Number</label>
                        <input type="text" name="license_number"
                               class="form-control"
                               value="{{ old('license_number', $staff->license_number) }}">
                    </div>

                    {{-- License Verified --}}
                    <div class="col-md-6 d-flex align-items-center gap-2">
                        <input type="hidden" name="license_verified" value="0">
                        <input type="checkbox" name="license_verified" value="1"
                               class="form-check-input"
                               @checked(old('license_verified', $staff->license_verified))>
                        <label class="form-check-label">License Verified</label>
                    </div>

                    {{-- Availability --}}
                    <div class="col-md-6 d-flex align-items-center gap-2">
                        <input type="hidden" name="is_available" value="0">
                        <input type="checkbox" name="is_available" value="1"
                               class="form-check-input"
                               @checked(old('is_available', $staff->is_available))>
                        <label class="form-check-label">Available for work</label>
                    </div>

                    {{-- Availability Type --}}
                    <div class="col-md-6">
                        <label class="form-label">Availability Type</label>
                        <select name="availability_type" class="form-select">
                            <option value="">Select type</option>
                            @foreach(['Onsite','Remote','Hybrid'] as $type)
                                <option value="{{ $type }}"
                                    @selected(old('availability_type', $staff->availability_type) === $type)>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 d-flex align-items-center gap-4">
                        <div>
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1"
                                   class="form-check-input"
                                   @checked(old('is_active', $staff->is_active))>
                            <label class="form-check-label">Active</label>
                        </div>

                        <div>
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" value="1"
                                   class="form-check-input"
                                   @checked(old('is_featured', $staff->is_featured))>
                            <label class="form-check-label">Featured</label>
                        </div>
                    </div>

                    {{-- Skills --}}
                    <div class="col-12">
                        <label class="form-label">Skills</label>
                        <div id="skills-wrapper">
                            @foreach(old('skills', $staff->skills ?? ['']) as $skill)
                                <div class="input-group mb-2">
                                    <input type="text" name="skills[]" class="form-control"
                                           value="{{ $skill }}">
                                    <button type="button" class="btn btn-outline-danger remove-skill">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-success add-skill">
                            <i class="bi bi-plus-circle"></i> Add skill
                        </button>
                    </div>

                    {{-- Photo --}}
                    <div class="col-md-6">
                        <label class="form-label">Profile Photo</label>
                        <input type="file" name="photo" class="form-control">
                        @if($staff->photo)
                            <small class="text-muted d-block mt-1">
                                Current photo saved
                            </small>
                        @endif
                    </div>

                    {{-- Bio --}}
                    <div class="col-12">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" rows="4">
{{ old('bio', $staff->bio) }}</textarea>
                    </div>

                </div>

            </div>

            <div class="card-footer bg-light border-0 rounded-bottom-4 text-end">
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-check-circle"></i> Update Staff
                </button>
            </div>

        </div>
    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.getElementById('skills-wrapper');

    document.querySelector('.add-skill').addEventListener('click', () => {
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="skills[]" class="form-control">
            <button type="button" class="btn btn-outline-danger remove-skill">
                <i class="bi bi-x"></i>
            </button>
        `;
        wrapper.appendChild(div);
    });

    wrapper.addEventListener('click', e => {
        if (e.target.closest('.remove-skill')) {
            e.target.closest('.input-group').remove();
        }
    });
});
</script>

@endsection
