@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Job Offer</h1>

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

    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.offers.store') }}">
                @csrf

                {{-- Title --}}
                <div class="form-group">
                    <label for="title">Job Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        required
                    >
                </div>

                {{-- Location --}}
                <div class="form-group">
                    <label for="location">Location</label>
                    <input
                        type="text"
                        name="location"
                        id="location"
                        class="form-control"
                        value="{{ old('location') }}"
                        required
                    >
                </div>

                {{-- Role --}}
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select name="role_id" id="role_id" class="form-control" required>
                        <option value="">-- Select Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Service Type --}}
                <div class="form-group">
                    <label for="service_type_id">Service Type</label>
                    <select name="service_type_id" id="service_type_id" class="form-control" required>
                        <option value="">-- Select Service Type --</option>
                        @foreach ($serviceTypes as $serviceType)
                            <option value="{{ $serviceType->id }}" {{ old('service_type_id') == $serviceType->id ? 'selected' : '' }}>
                                {{ $serviceType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Care Setting --}}
                <div class="form-group">
                    <label for="care_setting_id">Care Setting</label>
                    <select name="care_setting_id" id="care_setting_id" class="form-control" required>
                        <option value="">-- Select Care Setting --</option>
                        @foreach ($careSettings as $careSetting)
                            <option value="{{ $careSetting->id }}" {{ old('care_setting_id') == $careSetting->id ? 'selected' : '' }}>
                                {{ $careSetting->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Salary Range --}}
                <div class="form-group">
                    <label for="salary_range">Salary Range</label>
                    <input
                        type="text"
                        name="salary_range"
                        id="salary_range"
                        class="form-control"
                        value="{{ old('salary_range') }}"
                    >
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label for="description">Job Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="5"
                        class="form-control"
                        required
                    >{{ old('description') }}</textarea>
                </div>

                {{-- Requirements --}}
                <div class="form-group">
                    <label for="requirements">Requirements</label>
                    <textarea
                        name="requirements"
                        id="requirements"
                        rows="4"
                        class="form-control"
                    >{{ old('requirements') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Qualifications</label>

                    <div id="qualifications-wrapper">
                        <div class="input-group mb-2">
                            <input
                                type="text"
                                name="qualifications[]"
                                class="form-control"
                                placeholder="e.g. BSc in Nursing"
                            >
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-qualification">
                                    &times;
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary" id="add-qualification">
                        + Add Qualification
                    </button>
                </div>
                {{-- Active --}}
                <div class="form-group form-check">
                    <input type="hidden" name="is_active" value="0">
                    <input
                        type="checkbox"
                        name="is_active"
                        id="is_active"
                        class="form-check-input"
                        value="1"
                        {{ old('is_active', true) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="is_active">Active</label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-primary">
                    Create Offer
                </button>

            </form>

        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('qualifications-wrapper');
    const addBtn = document.getElementById('add-qualification');

    addBtn.addEventListener('click', function () {
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-2');

        div.innerHTML = `
            <input type="text" name="qualifications[]" class="form-control" placeholder="e.g. MSc, Certification">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-qualification">&times;</button>
            </div>
        `;

        wrapper.appendChild(div);
    });

    wrapper.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-qualification')) {
            e.target.closest('.input-group').remove();
        }
    });
});
</script>


@stop
