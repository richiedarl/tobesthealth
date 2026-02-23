{{-- resources/views/admin/staff/partials/hca-details.blade.php --}}
@if($hca)
<div class="card mb-3">
    <div class="card-header bg-light">
        <h6 class="mb-0">Healthcare Assistant Details</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-sm">
                    <tr>
                        <th width="200">Role Type:</th>
                        <td>{{ $hca->role_type ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Years Experience:</th>
                        <td>{{ $hca->years_of_experience }} years</td>
                    </tr>
                    <tr>
                        <th>Employment Status:</th>
                        <td>{{ ucfirst(str_replace('_', ' ', $hca->employment_status ?? 'N/A')) }}</td>
                    </tr>
                    <tr>
                        <th>Previous Care Settings:</th>
                        <td>
                            @if($hca->previous_care_settings)
                                @php $settings = json_decode($hca->previous_care_settings, true) ?? []; @endphp
                                @foreach($settings as $setting)
                                    <span class="badge bg-secondary">{{ ucfirst(str_replace('_', ' ', $setting)) }}</span>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-sm">
                    <tr>
                        <th width="200">Preferred Shift:</th>
                        <td>{{ ucfirst($hca->preferred_shift_type ?? 'N/A') }}</td>
                    </tr>
                    <tr>
                        <th>Preferred Location:</th>
                        <td>{{ $hca->preferred_location ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Max Travel Distance:</th>
                        <td>{{ $hca->max_travel_distance ?? 0 }} miles</td>
                    </tr>
                    <tr>
                        <th>Available From:</th>
                        <td>{{ $hca->available_start_date ? \Carbon\Carbon::parse($hca->available_start_date)->format('d/m/Y') : 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Skills & Training -->
        <div class="mt-3">
            <h6 class="font-weight-bold">Skills & Training</h6>
            <div class="d-flex flex-wrap gap-2">
                @if($hca->manual_handling_training)<span class="badge bg-success">Manual Handling</span>@endif
                @if($hca->first_aid_training)<span class="badge bg-success">First Aid</span>@endif
                @if($hca->safeguarding_training)<span class="badge bg-success">Safeguarding</span>@endif
                @if($hca->medication_assistance_experience)<span class="badge bg-info">Medication Assistance</span>@endif
                @if($hca->dementia_care_experience)<span class="badge bg-info">Dementia Care</span>@endif
                @if($hca->personal_care_experience)<span class="badge bg-info">Personal Care</span>@endif
                @if($hca->infection_prevention_training)<span class="badge bg-success">Infection Prevention</span>@endif
            </div>
            @if($hca->additional_hca_skills)
                <div class="mt-2">
                    <strong>Additional Skills:</strong>
                    <p>{{ $hca->additional_hca_skills }}</p>
                </div>
            @endif
        </div>

        <!-- Employment History -->
        @if($hca->employment_history)
            @php $history = json_decode($hca->employment_history, true) ?? []; @endphp
            @if(!empty($history))
                <div class="mt-3">
                    <h6 class="font-weight-bold">Employment History</h6>
                    @foreach($history as $job)
                        <div class="border rounded p-2 mb-2">
                            <strong>{{ $job['role'] ?? 'N/A' }}</strong> at {{ $job['employer'] ?? 'N/A' }}<br>
                            <small class="text-muted">
                                {{ $job['from'] ?? 'N/A' }} - {{ $job['to'] ?? 'Present' }}
                                @if(!empty($job['reason_for_leaving']))
                                    <br>Reason: {{ $job['reason_for_leaving'] }}
                                @endif
                            </small>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</div>
@endif