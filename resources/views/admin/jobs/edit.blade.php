@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Job Offer</h1>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('admin.offer.update', $offer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">
                        <label>Job Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title', $offer->title) }}"
                            required
                        >
                    </div>

                    {{-- Location --}}
                    <div class="col-md-6 mb-3">
                        <label>Location</label>
                        <input
                            type="text"
                            name="location"
                            class="form-control"
                            value="{{ old('location', $offer->location) }}"
                            required
                        >
                    </div>

                    {{-- Role --}}
                    <div class="col-md-4 mb-3">
                        <label>Role</label>
                        <select name="role_id" class="form-control" required>
                            <option value="">Select role</option>
                            @foreach ($roles as $role)
                                <option
                                    value="{{ $role->id }}"
                                    {{ old('role_id', $offer->role_id) == $role->id ? 'selected' : '' }}
                                >
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Service Type --}}
                    <div class="col-md-4 mb-3">
                        <label>Service Type</label>
                        <select name="service_type_id" class="form-control" required>
                            <option value="">Select service type</option>
                            @foreach ($serviceTypes as $service)
                                <option
                                    value="{{ $service->id }}"
                                    {{ old('service_type_id', $offer->service_type_id) == $service->id ? 'selected' : '' }}
                                >
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Care Setting --}}
                    <div class="col-md-4 mb-3">
                        <label>Care Setting</label>
                        <select name="care_setting_id" class="form-control" required>
                            <option value="">Select care setting</option>
                            @foreach ($careSettings as $setting)
                                <option
                                    value="{{ $setting->id }}"
                                    {{ old('care_setting_id', $offer->care_setting_id) == $setting->id ? 'selected' : '' }}
                                >
                                    {{ $setting->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Salary --}}
                    <div class="col-md-6 mb-3">
                        <label>Salary Range</label>
                        <input
                            type="text"
                            name="salary_range"
                            class="form-control"
                            value="{{ old('salary_range', $offer->salary_range) }}"
                        >
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ $offer->is_active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$offer->is_active ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea
                            name="description"
                            rows="4"
                            class="form-control"
                            required
                        >{{ old('description', $offer->description) }}</textarea>
                    </div>

                    {{-- Requirements --}}
                    <div class="col-md-12 mb-3">
                        <label>Requirements</label>
                        <textarea
                            name="requirements"
                            rows="3"
                            class="form-control"
                        >{{ old('requirements', $offer->requirements) }}</textarea>
                    </div>

                    {{-- Qualifications --}}
                    <div class="col-md-12 mb-3">
                        <label>Qualifications</label>

                        <div id="qualifications-wrapper">
                            @foreach (old('qualifications', $offer->qualifications ?? []) as $qualification)
                                <div class="input-group mb-2">
                                    <input
                                        type="text"
                                        name="qualifications[]"
                                        class="form-control"
                                        value="{{ $qualification }}"
                                    >
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger remove-qualification">
                                            &times;
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button
                            type="button"
                            class="btn btn-sm btn-outline-primary"
                            id="add-qualification"
                        >
                            + Add Qualification
                        </button>
                    </div>

                </div>

                <hr>

                <button type="submit" class="btn btn-success">
                    Update Offer
                </button>

                <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>
    </div>

</div>

{{-- Qualifications JS --}}
<script>
document.getElementById('add-qualification').addEventListener('click', function () {
    const wrapper = document.getElementById('qualifications-wrapper');

    const div = document.createElement('div');
    div.classList.add('input-group', 'mb-2');

    div.innerHTML = `
        <input type="text" name="qualifications[]" class="form-control">
        <div class="input-group-append">
            <button type="button" class="btn btn-danger remove-qualification">&times;</button>
        </div>
    `;

    wrapper.appendChild(div);
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-qualification')) {
        e.target.closest('.input-group').remove();
    }
});
</script>

@stop
