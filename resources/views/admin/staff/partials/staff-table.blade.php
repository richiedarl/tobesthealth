<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            @if(isset($type))
                {{ $type === 'nurse' ? 'Nurses' : 'Healthcare Assistants' }}
            @else
                All Staff Members
            @endif
        </h6>
        <div class="text-muted small">
            Total: <span class="badge bg-primary">{{ $staff->count() }}</span>
        </div>
    </div>
    <div class="card-body">

        @if ($staff->count() === 0)
            <div class="text-center py-5">
                <i class="fas fa-users" style="font-size: 3rem; color: #d1d3e2;"></i>
                <p class="text-muted mt-3 mb-0">No staff members found.</p>
                @if(isset($type))
                    <p class="text-muted small">No {{ $type === 'nurse' ? 'nurses' : 'healthcare assistants' }} registered yet.</p>
                @endif
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Role Type</th>
                            <th>Experience</th>
                            <th>Skills & Training</th>
                            <th>Work Preferences</th>
                            <th>Status</th>
                            <th>Compliance</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $member)
                            @php
                                $hca = $member->hcaDetails;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                {{-- Name with basic info --}}
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($member->photo)
                                            <img src="{{ asset('storage/'.$member->photo) }}" 
                                                 alt="{{ $member->full_name }}" 
                                                 class="rounded-circle me-2" 
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-circle me-2 d-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-user text-secondary"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <strong>{{ $member->full_name }}</strong>
                                            @if($member->date_of_birth)
                                                <br><small class="text-muted">DOB: {{ \Carbon\Carbon::parse($member->date_of_birth)->format('d/m/Y') }}</small>
                                            @endif
                                            @if($member->nationality)
                                                <br><small class="text-muted"><i class="fas fa-flag"></i> {{ $member->nationality }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                
                                {{-- Contact Info --}}
                                <td>
                                    <div>
                                        <i class="fas fa-envelope text-primary" title="Email"></i> 
                                        <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                    </div>
                                    <div>
                                        <i class="fas fa-phone text-success" title="Phone"></i> 
                                        {{ $member->phone }}
                                    </div>
                                    @if($member->alternative_phone)
                                        <div>
                                            <i class="fas fa-phone text-secondary" title="Alternative Phone"></i> 
                                            {{ $member->alternative_phone }}
                                        </div>
                                    @endif
                                </td>
                                
                                {{-- Role Type --}}
                                <td>
                                    @if($member->role === 'Nurse')
                                        <span class="badge bg-info mb-1">Nurse</span>
                                        @if($member->professional_title)
                                            <div><small>{{ $member->professional_title }}</small></div>
                                        @endif
                                        @if($member->clinical_specialisation)
                                            <div><small class="text-muted">{{ $member->clinical_specialisation }}</small></div>
                                        @endif
                                    @else
                                        <span class="badge bg-success mb-1">HCA</span>
                                        @if($hca && $hca->role_type)
                                            <div><small>{{ $hca->role_type }}</small></div>
                                        @endif
                                    @endif
                                </td>
                                
                                {{-- Experience --}}
                                <td>
                                    <div><strong>{{ $member->years_of_experience ?? 0 }} years</strong></div>
                                    @if($member->role === 'Nurse' && $member->employment_status)
                                        <div><small class="text-muted">{{ ucfirst(str_replace('_', ' ', $member->employment_status)) }}</small></div>
                                    @endif
                                    @if($member->role !== 'Nurse' && $hca && $hca->employment_status)
                                        <div><small class="text-muted">{{ ucfirst(str_replace('_', ' ', $hca->employment_status)) }}</small></div>
                                    @endif
                                </td>
                                
                                {{-- Skills & Training --}}
                                <td>
                                    @if($member->role === 'Nurse')
                                        @if($member->clinical_skills)
                                            @php $skills = json_decode($member->clinical_skills, true) ?? []; @endphp
                                            @foreach(array_slice($skills, 0, 3) as $skill)
                                                <span class="badge bg-secondary mb-1">{{ ucfirst(str_replace('_', ' ', $skill)) }}</span>
                                            @endforeach
                                        @endif
                                    @else
                                        @if($hca)
                                            <div class="small">
                                                @if($hca->manual_handling_training)<span class="badge bg-success mb-1" title="Manual Handling">MH</span>@endif
                                                @if($hca->first_aid_training)<span class="badge bg-success mb-1" title="First Aid">FA</span>@endif
                                                @if($hca->safeguarding_training)<span class="badge bg-success mb-1" title="Safeguarding">SG</span>@endif
                                                @if($hca->medication_assistance_experience)<span class="badge bg-info mb-1" title="Medication Assistance">Med</span>@endif
                                                @if($hca->dementia_care_experience)<span class="badge bg-info mb-1" title="Dementia Care">Dementia</span>@endif
                                                @if($hca->personal_care_experience)<span class="badge bg-info mb-1" title="Personal Care">PC</span>@endif
                                            </div>
                                            @if($hca->additional_hca_skills)
                                                <small class="text-muted">{{ Str::limit($hca->additional_hca_skills, 30) }}</small>
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                
                                {{-- Work Preferences --}}
                                <td>
                                    @if($member->role === 'Nurse')
                                        @if($member->preferred_work_type)
                                            <div><small><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $member->preferred_work_type)) }}</small></div>
                                        @endif
                                        @if($member->preferred_shift_pattern)
                                            <div><small><strong>Shift:</strong> {{ ucfirst($member->preferred_shift_pattern) }}</small></div>
                                        @endif
                                    @else
                                        @if($hca && $hca->preferred_shift_type)
                                            <div><small><strong>Shift:</strong> {{ ucfirst($hca->preferred_shift_type) }}</small></div>
                                        @endif
                                    @endif
                                    
                                    @if($member->location)
                                        <div><small><i class="fas fa-map-marker-alt"></i> {{ $member->location }}</small></div>
                                    @endif
                                    
                                    @if($member->willing_to_relocate)
                                        <span class="badge bg-warning">Relocate</span>
                                    @endif
                                    @if($member->weekend_availability)
                                        <span class="badge bg-success">Weekends</span>
                                    @endif
                                </td>
                                
                                {{-- Status --}}
                                <td>
                                    <div class="mb-1">
                                        <span class="badge {{ $member->is_available ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $member->is_available ? '✓ Available' : '✗ Unavailable' }}
                                        </span>
                                    </div>
                                    <div class="mb-1">
                                        <span class="badge {{ $member->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $member->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                    @if($member->is_featured)
                                        <span class="badge bg-warning"><i class="fas fa-star"></i> Featured</span>
                                    @endif
                                </td>
                                
                                {{-- Compliance --}}
                                <td>
                                    <div class="mb-1">
                                        <span class="badge {{ $member->right_to_work_uk ? 'bg-success' : 'bg-danger' }}" 
                                              title="Right to Work in UK">
                                            <i class="fas fa-passport"></i> RTW
                                        </span>
                                    </div>
                                    @if($member->dbs_check_status)
                                        <div class="mb-1">
                                            <span class="badge bg-info" title="DBS Status">
                                                DBS: {{ ucfirst(str_replace('_', ' ', $member->dbs_check_status)) }}
                                            </span>
                                        </div>
                                    @endif
                                </td>
                                
                                {{-- Actions --}}
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.staff.show', $member->id) }}" class="btn btn-sm btn-info" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.staff.edit', $member->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.staff.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this staff member? This action cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(isset($showPagination) && $showPagination)
                    <div class="d-flex justify-content-center">
                        {{ $staff->links() }}
                    </div>
                @endif
            </div>
        @endif

    </div>
</div>