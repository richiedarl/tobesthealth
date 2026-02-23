@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Staff Details</h1>
        <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Staff
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ $staff->full_name }} - {{ $staff->role }}
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Personal Information -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Personal Information</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th width="150">Full Name:</th>
                                    <td>{{ $staff->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth:</th>
                                    <td>{{ $staff->date_of_birth ? \Carbon\Carbon::parse($staff->date_of_birth)->format('d/m/Y') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td>{{ ucfirst($staff->gender) }}</td>
                                </tr>
                                <tr>
                                    <th>Nationality:</th>
                                    <td>{{ $staff->nationality ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $staff->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $staff->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Alternative Phone:</th>
                                    <td>{{ $staff->alternative_phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $staff->address }}, {{ $staff->city }}, {{ $staff->postcode }}</td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td>{{ $staff->country_of_residence }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Emergency Contact</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th width="150">Name:</th>
                                    <td>{{ $staff->emergency_contact_name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $staff->emergency_contact_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Relationship:</th>
                                    <td>{{ $staff->emergency_contact_relationship }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Identification & Compliance -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Identification</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th width="150">ID Type:</th>
                                    <td>{{ ucfirst(str_replace('_', ' ', $staff->government_id_type ?? 'N/A')) }}</td>
                                </tr>
                                <tr>
                                    <th>ID Number:</th>
                                    <td>{{ $staff->government_id_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>ID Expiry:</th>
                                    <td>{{ $staff->government_id_expiry ? \Carbon\Carbon::parse($staff->government_id_expiry)->format('d/m/Y') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>National Insurance:</th>
                                    <td>{{ $staff->national_insurance_number ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Compliance</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th width="150">Right to Work UK:</th>
                                    <td>
                                        <span class="badge {{ $staff->right_to_work_uk ? 'badge-success' : 'badge-danger' }}">
                                            {{ $staff->right_to_work_uk ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>DBS Status:</th>
                                    <td>{{ ucfirst(str_replace('_', ' ', $staff->dbs_check_status ?? 'Not provided')) }}</td>
                                </tr>
                                <tr>
                                    <th>Available:</th>
                                    <td>
                                        <span class="badge {{ $staff->is_available ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $staff->is_available ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Active:</th>
                                    <td>
                                        <span class="badge {{ $staff->is_active ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $staff->is_active ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Role Specific Information -->
            @if($staff->role === 'Nurse')
                @include('admin.staff.partials.nurse-details', ['staff' => $staff])
            @else
                @include('admin.staff.partials.hca-details', ['staff' => $staff, 'hca' => $staff->hcaDetails])
            @endif

            <!-- Documents -->
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Documents</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($staff->photo)
                            <div class="col-md-3 mb-2">
                                <a href="{{ asset('storage/'.$staff->photo) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-camera"></i> Photo
                                </a>
                            </div>
                        @endif
                        @if($staff->document_uploads)
                            @php $docs = json_decode($staff->document_uploads, true) ?? []; @endphp
                            @foreach($docs as $type => $path)
                                <div class="col-md-3 mb-2">
                                    <a href="{{ asset('storage/'.$path) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-file-text"></i> {{ ucfirst(str_replace('_', ' ', $type)) }}
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Applications -->
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Applications</h6>
                </div>
                <div class="card-body">
                    @if($staff->applications->count() > 0)
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staff->applications as $app)
                                    <tr>
                                        <td>{{ $app->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <span class="badge badge-{{ $app->status === 'rejected' ? 'danger' : ($app->status === 'shortlisted' ? 'success' : 'warning') }}">
                                                {{ ucfirst($app->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.applications.show', $app) }}" class="btn btn-xs btn-info">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted mb-0">No applications found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection