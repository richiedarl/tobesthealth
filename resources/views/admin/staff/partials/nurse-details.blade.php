{{-- resources/views/admin/staff/partials/nurse-details.blade.php --}}
<div class="card mb-3">
    <div class="card-header bg-light">
        <h6 class="mb-0">Nurse Details</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-sm">
                    <tr>
                        <th width="200">Professional Title:</th>
                        <td>{{ $staff->professional_title ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Nursing PIN:</th>
                        <td>{{ $staff->license_number ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Licensing Authority:</th>
                        <td>{{ $staff->licensing_authority ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>License Issue Date:</th>
                        <td>{{ $staff->license_issue_date ? \Carbon\Carbon::parse($staff->license_issue_date)->format('d/m/Y') : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>License Expiry:</th>
                        <td>
                            @if($staff->license_expiry_date)
                                <span class="{{ \Carbon\Carbon::parse($staff->license_expiry_date)->isPast() ? 'text-danger' : 'text-success' }}">
                                    {{ \Carbon\Carbon::parse($staff->license_expiry_date)->format('d/m/Y') }}
                                </span>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>License Verified:</th>
                        <td>
                            <span class="badge {{ $staff->license_verified ? 'badge-success' : 'badge-warning' }}">
                                {{ $staff->license_verified ? 'Yes' : 'No' }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-sm">
                    <tr>
                        <th width="200">Clinical Specialisation:</th>
                        <td>{{ $staff->clinical_specialisation ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Care Specialty:</th>
                        <td>{{ $staff->care_specialty ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Employment Status:</th>
                        <td>{{ ucfirst(str_replace('_', ' ', $staff->employment_status ?? 'N/A')) }}</td>
                    </tr>
                    <tr>
                        <th>Preferred Work Type:</th>
                        <td>{{ ucfirst(str_replace('_', ' ', $staff->preferred_work_type ?? 'N/A')) }}</td>
                    </tr>
                    <tr>
                        <th>Preferred Shift:</th>
                        <td>{{ ucfirst($staff->preferred_shift_pattern ?? 'N/A') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Qualifications -->
        <div class="mt-3">
            <h6 class="font-weight-bold">Qualifications</h6>
            <table class="table table-sm">
                <tr>
                    <th width="200">Highest Qualification:</th>
                    <td>{{ $staff->highest_qualification ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Institution:</th>
                    <td>{{ $staff->institution ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td>{{ $staff->country_of_qualification ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Graduation Year:</th>
                    <td>{{ $staff->graduation_year ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>English Language:</th>
                    <td>{{ $staff->english_language_qualification ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>

        <!-- Clinical Skills -->
        @if($staff->clinical_skills)
            @php $skills = json_decode($staff->clinical_skills, true) ?? []; @endphp
            @if(!empty($skills))
                <div class="mt-3">
                    <h6 class="font-weight-bold">Clinical Skills</h6>
                    @foreach($skills as $skill)
                        <span class="badge bg-secondary">{{ ucfirst(str_replace('_', ' ', $skill)) }}</span>
                    @endforeach
                </div>
            @endif
        @endif

        <!-- Bio/Cover Letter -->
        @if($staff->bio)
            <div class="mt-3">
                <h6 class="font-weight-bold">Cover Letter / Bio</h6>
                <p>{{ $staff->bio }}</p>
            </div>
        @endif
    </div>
</div>