{{-- resources/views/emails/admin-staff-notification.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Application Submitted</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #1a2e3b;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(165deg, #1b7e6f, #0e6b5c);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8fafc;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .section {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #e2edf2;
        }
        .section-title {
            color: #1b7e6f;
            border-bottom: 2px solid #1b7e6f;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .field {
            margin-bottom: 10px;
        }
        .field-label {
            font-weight: 600;
            color: #1a4a5f;
            font-size: 0.9rem;
        }
        .field-value {
            color: #2c3e50;
            padding: 5px 0;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .badge-success {
            background: #d4edda;
            color: #155724;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: #6c757d;
            font-size: 0.9rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #e2edf2;
        }
        th {
            background: #f0fafc;
            color: #1a4a5f;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New {{ $applicationType === 'nurse' ? 'Nurse' : 'Healthcare Assistant' }} Application</h1>
        <p>Submitted on {{ now()->format('F j, Y \a\t g:i A') }}</p>
    </div>

    <div class="content">
        <!-- Application Type Badge -->
        <div style="text-align: right; margin-bottom: 20px;">
            <span class="badge badge-success">
                {{ ucfirst($applicationType) }} Application
            </span>
        </div>

        <!-- Personal Information Section -->
        <div class="section">
            <h2 class="section-title">Personal Information</h2>
            <div class="grid">
                <div class="field">
                    <div class="field-label">Full Name</div>
                    <div class="field-value">{{ $data['name'] ?? $staff->full_name }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Date of Birth</div>
                    <div class="field-value">{{ $data['date_of_birth'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Gender</div>
                    <div class="field-value">{{ ucfirst($data['gender'] ?? 'N/A') }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Nationality</div>
                    <div class="field-value">{{ $data['nationality'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Phone</div>
                    <div class="field-value">{{ $data['phone'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Alternative Phone</div>
                    <div class="field-value">{{ $data['alternative_phone'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Email</div>
                    <div class="field-value">{{ $data['email'] ?? $staff->email }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Address</div>
                    <div class="field-value">{{ $data['address'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">City</div>
                    <div class="field-value">{{ $data['city'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Postcode</div>
                    <div class="field-value">{{ $data['postcode'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Country of Residence</div>
                    <div class="field-value">{{ $data['country_of_residence'] ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <!-- Emergency Contact Section -->
        <div class="section">
            <h2 class="section-title">Emergency Contact</h2>
            <div class="grid">
                <div class="field">
                    <div class="field-label">Contact Name</div>
                    <div class="field-value">{{ $data['emergency_contact_name'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Contact Phone</div>
                    <div class="field-value">{{ $data['emergency_contact_phone'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Relationship</div>
                    <div class="field-value">{{ $data['emergency_contact_relationship'] ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <!-- Identification Section -->
        <div class="section">
            <h2 class="section-title">Identification</h2>
            <div class="grid">
                <div class="field">
                    <div class="field-label">ID Type</div>
                    <div class="field-value">{{ ucfirst(str_replace('_', ' ', $data['government_id_type'] ?? 'N/A')) }}</div>
                </div>
                <div class="field">
                    <div class="field-label">ID Number</div>
                    <div class="field-value">{{ $data['government_id_number'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">ID Expiry</div>
                    <div class="field-value">{{ $data['government_id_expiry'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">National Insurance</div>
                    <div class="field-value">{{ $data['national_insurance_number'] ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <!-- Professional Information - Conditional based on role -->
        @if($applicationType === 'nurse')
            <div class="section">
                <h2 class="section-title">Professional Information (Nurse)</h2>
                <div class="grid">
                    <div class="field">
                        <div class="field-label">Professional Title</div>
                        <div class="field-value">{{ $data['professional_title'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Nursing PIN</div>
                        <div class="field-value">{{ $data['license_number'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Licensing Authority</div>
                        <div class="field-value">{{ $data['licensing_authority'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">License Issue Date</div>
                        <div class="field-value">{{ $data['license_issue_date'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">License Expiry Date</div>
                        <div class="field-value">{{ $data['license_expiry_date'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Years of Experience</div>
                        <div class="field-value">{{ $data['years_of_experience'] ?? '0' }} years</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Clinical Specialisation</div>
                        <div class="field-value">{{ $data['clinical_specialisation'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Employment Status</div>
                        <div class="field-value">{{ ucfirst(str_replace('_', ' ', $data['employment_status'] ?? 'N/A')) }}</div>
                    </div>
                </div>

                @if(!empty($data['clinical_skills']))
                <div style="margin-top: 20px;">
                    <div class="field-label">Clinical Skills</div>
                    <div style="display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px;">
                        @foreach($data['clinical_skills'] as $skill)
                            <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px; font-size: 0.9rem;">{{ ucfirst(str_replace('_', ' ', $skill)) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!empty($data['cover_letter']))
                <div style="margin-top: 20px;">
                    <div class="field-label">Cover Letter</div>
                    <div style="background: #f8fafc; padding: 15px; border-radius: 8px; margin-top: 10px;">
                        {{ $data['cover_letter'] }}
                    </div>
                </div>
                @endif
            </div>
        @endif

        <!-- HCA Specific Section -->
        @if($applicationType === 'healthcare_worker' && $hcaDetails)
            <div class="section">
                <h2 class="section-title">Healthcare Assistant Information</h2>
                <div class="grid">
                    <div class="field">
                        <div class="field-label">Role Type</div>
                        <div class="field-value">{{ $hcaDetails->role_type ?? $data['role_type'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Years of Experience</div>
                        <div class="field-value">{{ $data['years_of_experience'] ?? '0' }} years</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Employment Status</div>
                        <div class="field-value">{{ ucfirst(str_replace('_', ' ', $data['employment_status'] ?? 'N/A')) }}</div>
                    </div>
                </div>

                @if(!empty($data['previous_care_settings']))
                <div style="margin-top: 20px;">
                    <div class="field-label">Previous Care Settings</div>
                    <div style="display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px;">
                        @foreach($data['previous_care_settings'] as $setting)
                            <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px; font-size: 0.9rem;">{{ ucfirst(str_replace('_', ' ', $setting)) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Skills & Training -->
                <div style="margin-top: 20px;">
                    <div class="field-label">Skills & Training</div>
                    <div style="display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px;">
                        @if($request->has('manual_handling_training')) <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px;">Manual Handling</span> @endif
                        @if($request->has('first_aid_training')) <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px;">First Aid</span> @endif
                        @if($request->has('safeguarding_training')) <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px;">Safeguarding</span> @endif
                        @if($request->has('medication_assistance_experience')) <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px;">Medication Assistance</span> @endif
                        @if($request->has('dementia_care_experience')) <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px;">Dementia Care</span> @endif
                        @if($request->has('personal_care_experience')) <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px;">Personal Care</span> @endif
                        @if($request->has('infection_prevention_training')) <span style="background: #e2edf2; padding: 3px 10px; border-radius: 15px;">Infection Prevention</span> @endif
                    </div>
                </div>

                @if(!empty($data['additional_hca_skills']))
                <div style="margin-top: 20px;">
                    <div class="field-label">Additional Skills</div>
                    <div class="field-value">{{ $data['additional_hca_skills'] }}</div>
                </div>
                @endif
            </div>
        @endif

        <!-- Work Preferences Section (Common) -->
        <div class="section">
            <h2 class="section-title">Work Preferences</h2>
            <div class="grid">
                <div class="field">
                    <div class="field-label">Preferred Location</div>
                    <div class="field-value">{{ $data['preferred_location'] ?? 'N/A' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Max Travel Distance</div>
                    <div class="field-value">{{ $data['max_travel_distance'] ?? '0' }} miles</div>
                </div>
                <div class="field">
                    <div class="field-label">Willing to Relocate</div>
                    <div class="field-value">{{ isset($data['willing_to_relocate']) && $data['willing_to_relocate'] ? 'Yes' : 'No' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Weekend Availability</div>
                    <div class="field-value">{{ isset($data['weekend_availability']) && $data['weekend_availability'] ? 'Yes' : 'No' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Available Start Date</div>
                    <div class="field-value">{{ $data['available_start_date'] ?? 'N/A' }}</div>
                </div>
                @if($applicationType === 'nurse' && !empty($data['preferred_shift_pattern']))
                <div class="field">
                    <div class="field-label">Preferred Shift Pattern</div>
                    <div class="field-value">{{ ucfirst($data['preferred_shift_pattern'] ?? 'N/A') }}</div>
                </div>
                @endif
                @if($applicationType === 'healthcare_worker' && !empty($data['preferred_shift_type']))
                <div class="field">
                    <div class="field-label">Preferred Shift Type</div>
                    <div class="field-value">{{ ucfirst($data['preferred_shift_type'] ?? 'N/A') }}</div>
                </div>
                @endif
            </div>
        </div>

        <!-- Documents Uploaded -->
        <div class="section">
            <h2 class="section-title">Documents Uploaded</h2>
            <table>
                <thead>
                    <tr>
                        <th>Document Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Government ID</td>
                        <td>{{ $request->hasFile('government_id_upload') ? '✓ Uploaded' : '✗ Not uploaded' }}</td>
                    </tr>
                    <tr>
                        <td>Right to Work Document</td>
                        <td>{{ $request->hasFile('right_to_work_upload') ? '✓ Uploaded' : '✗ Not uploaded' }}</td>
                    </tr>
                    <tr>
                        <td>CV / Resume</td>
                        <td>{{ $request->hasFile('resume') ? '✓ Uploaded' : '✗ Not uploaded' }}</td>
                    </tr>
                    <tr>
                        <td>Proof of Address</td>
                        <td>{{ $request->hasFile('proof_of_address') ? '✓ Uploaded' : '✗ Not uploaded' }}</td>
                    </tr>
                    <tr>
                        <td>Passport Photograph</td>
                        <td>{{ $request->hasFile('photo') ? '✓ Uploaded' : '✗ Not uploaded' }}</td>
                    </tr>
                    @if($applicationType === 'nurse')
                    <tr>
                        <td>Nursing License</td>
                        <td>{{ $request->hasFile('nursing_license') ? '✓ Uploaded' : '✗ Not uploaded' }}</td>
                    </tr>
                    <tr>
                        <td>Degree Certificate</td>
                        <td>{{ $request->hasFile('degree_certificate') ? '✓ Uploaded' : '✗ Not uploaded' }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Compliance Section -->
        <div class="section">
            <h2 class="section-title">Compliance</h2>
            <div class="grid">
                <div class="field">
                    <div class="field-label">Right to Work in UK</div>
                    <div class="field-value">{{ isset($data['right_to_work_uk']) && $data['right_to_work_uk'] ? 'Yes' : 'No' }}</div>
                </div>
                <div class="field">
                    <div class="field-label">DBS Check Status</div>
                    <div class="field-value">{{ ucfirst(str_replace('_', ' ', $data['dbs_check_status'] ?? 'Not provided')) }}</div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>This application was submitted via the {{ $applicationType === 'nurse' ? 'Nurse' : 'Healthcare Assistant' }} registration form.</p>
            <p>Please log in to the admin panel to review the full application and documents.</p>
            <p><strong>Application ID:</strong> {{ $staff->id }}</p>
            <p><strong>Submitted:</strong> {{ now()->format('F j, Y \a\t g:i A') }}</p>
        </div>
    </div>
</body>
</html>