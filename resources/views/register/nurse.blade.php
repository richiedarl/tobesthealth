@extends('layouts.app')

@section('content')
<section class="py-5 bg-light" style="background: transparent !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <!-- subtle trigger + heading combined with download options -->
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                    <h3 class="fw-bold text-success mb-0"><i class="bi bi-journal-plus me-2"></i> Professional Registration</h3>
                    <div class="d-flex gap-2 flex-wrap">
                        <!-- QR Code Modal Trigger -->
                        <button type="button" class="btn-open-benefits d-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#qrModal">
                            <i class="bi bi-qr-code-scan me-2" style="color: #0e6b5c;"></i> Share form
                        </button>
                        <!-- Download Dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn-open-benefits d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-download me-2" style="color: #0e6b5c;"></i> Download
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="downloadAsImage()"><i class="bi bi-image me-2"></i>Download as Image</a></li>
                                <li><a class="dropdown-item" href="#" onclick="downloadAsPDF()"><i class="bi bi-file-pdf me-2"></i>Download as PDF</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" onclick="printForm()"><i class="bi bi-printer me-2"></i>Print Form</a></li>
                            </ul>
                        </div>
                        <!-- Benefits Modal Trigger -->
                        <button type="button" class="btn-open-benefits d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#benefitsModal">
                            <i class="bi bi-gift-fill me-2" style="color: #0e6b5c;"></i> See role benefits
                            <i class="bi bi-chevron-right ms-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Download Notice -->
                <div class="alert alert-info alert-dismissible fade show mb-4" id="downloadNotice" style="display: none;">
                    <i class="bi bi-info-circle me-2"></i>
                    <span id="downloadMessage">Preparing your download...</span>
                    <button type="button" class="btn-close" onclick="document.getElementById('downloadNotice').style.display='none'"></button>
                </div>

                <!-- Progress Bar -->
                <div class="progress mb-4" style="height: 8px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%;" id="progressBar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <!-- Step Indicators -->
                <div class="d-flex justify-content-between mb-4 step-indicators">
                    <div class="step-item active" id="step1-indicator">
                        <div class="step-circle">1</div>
                        <div class="step-label">Personal</div>
                    </div>
                    <div class="step-item" id="step2-indicator">
                        <div class="step-circle">2</div>
                        <div class="step-label">Professional</div>
                    </div>
                    <div class="step-item" id="step3-indicator">
                        <div class="step-circle">3</div>
                        <div class="step-label">Work & Skills</div>
                    </div>
                    <div class="step-item" id="step4-indicator">
                        <div class="step-circle">4</div>
                        <div class="step-label">Documents</div>
                    </div>
                    <div class="step-item" id="step5-indicator">
                        <div class="step-circle">5</div>
                        <div class="step-label">Review</div>
                    </div>
                </div>

                <div class="card shadow-lg border-0 rounded-4" id="registrationForm">
                    <div class="card-body p-5">
                        
                        <div class="text-center mb-4" id="formHeader">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50" class="mb-3" onerror="this.style.display='none'">
                            <h2 class="fw-bold text-success d-flex align-items-center justify-content-center">
                                <i class="bi bi-heart-pulse me-2" style="font-size: 2rem;"></i>
                                Nurse Registration
                            </h2>
                            <p class="text-muted">Complete all sections to apply for nursing positions</p>
                            <div class="border-bottom my-3"></div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register.nurse.save') }}" enctype="multipart/form-data" id="nurseForm">
                            {{ csrf_field() }}
                            
                            <!-- STEP 1: PERSONAL & IDENTIFICATION -->
                            <div class="step" id="step1">
                                <!-- A. PERSONAL INFORMATION -->
                                
                                
                                <div class="form-section mb-4">
                                    {{-- Role Selection --}}
                                <div class="col-md-12">
                                    <label class="form-label">Applying As *</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">Select Role</option>
                                        <option value="nurse">Nurse</option>
                                        {{-- <option value="doctor">Doctor</option> --}}
                                    </select>
                                </div>
                                    <h4 class="text-success mb-3"><i class="bi bi-person-badge me-2"></i>Personal Information</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name *</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Birth *</label>
                                            <input type="date" name="date_of_birth" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Gender *</label>
                                            <select name="gender" class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Prefer not to say</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Nationality *</label>
                                            <input type="text" name="nationality" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number *</label>
                                            <input type="text" name="phone" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Alternative Phone Number</label>
                                            <input type="text" name="alternative_phone" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-8">
                                            <label class="form-label">Residential Address *</label>
                                            <input type="text" name="address" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">City *</label>
                                            <input type="text" name="city" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Postcode / ZIP Code *</label>
                                            <input type="text" name="postcode" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Country of Residence *</label>
                                            <input type="text" name="country_of_residence" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Emergency Contact Name *</label>
                                            <input type="text" name="emergency_contact_name" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Emergency Contact Phone *</label>
                                            <input type="text" name="emergency_contact_phone" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Relationship to Emergency Contact *</label>
                                            <input type="text" name="emergency_contact_relationship" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- B. IDENTIFICATION DETAILS -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-card-text me-2"></i>Identification Details</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Government ID Type *</label>
                                            <select name="government_id_type" class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="passport">Passport</option>
                                                <option value="national_id">National ID</option>
                                                <option value="drivers_license">Driver's License</option>
                                                <option value="brp">BRP</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">ID Number *</label>
                                            <input type="text" name="government_id_number" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">ID Expiry Date *</label>
                                            <input type="date" name="government_id_expiry" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">National Insurance Number</label>
                                            <input type="text" name="national_insurance_number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 2: PROFESSIONAL INFORMATION -->
                            <div class="step" id="step2" style="display: none;">
                                <!-- C. PROFESSIONAL INFORMATION -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-briefcase me-2"></i>Professional Information</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Professional Title *</label>
                                            <select name="professional_title" class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="Registered Nurse">Registered Nurse</option>
                                                <option value="Mental Health Nurse">Mental Health Nurse</option>
                                                <option value="Pediatric Nurse">Pediatric Nurse</option>
                                                <option value="ICU Nurse">ICU Nurse</option>
                                                <option value="Community Nurse">Community Nurse</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Nursing PIN Number *</label>
                                            <input type="text" name="license_number" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Licensing Authority *</label>
                                            <input type="text" name="licensing_authority" class="form-control" placeholder="e.g., NMC UK" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">License Issue Date *</label>
                                            <input type="date" name="license_issue_date" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">License Expiry Date *</label>
                                            <input type="date" name="license_expiry_date" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Years of Professional Experience *</label>
                                            <input type="number" name="years_of_experience" class="form-control" min="0" required>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="form-label">Clinical Specialisation *</label>
                                            <select name="clinical_specialisation" class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="General Ward">General Ward</option>
                                                <option value="Mental Health">Mental Health</option>
                                                <option value="ICU/Critical Care">ICU / Critical Care</option>
                                                <option value="Pediatric Care">Pediatric Care</option>
                                                <option value="Elderly Care">Elderly Care</option>
                                                <option value="Community Nursing">Community Nursing</option>
                                                <option value="Other">Other (please specify below)</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="form-label">Other Specialisation (if selected above)</label>
                                            <input type="text" name="care_specialty" class="form-control" placeholder="Please specify">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Current Employment Status *</label>
                                            <select name="employment_status" class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="employed">Employed</option>
                                                <option value="self_employed">Self-Employed</option>
                                                <option value="agency_staff">Agency Staff</option>
                                                <option value="unemployed">Unemployed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- E. QUALIFICATIONS & EDUCATION (Partial) -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-mortarboard me-2"></i>Qualifications & Education</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Highest Nursing Qualification *</label>
                                            <input type="text" name="highest_qualification" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">University / Training Institution *</label>
                                            <input type="text" name="institution" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Country of Qualification *</label>
                                            <input type="text" name="country_of_qualification" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Year of Graduation *</label>
                                            <input type="number" name="graduation_year" class="form-control" min="1950" max="{{ date('Y') }}" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">English Language Qualification</label>
                                            <input type="text" name="english_language_qualification" class="form-control" placeholder="e.g., IELTS 7.0, OET">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 3: WORK PREFERENCES & SKILLS -->
                            <div class="step" id="step3" style="display: none;">
                                <!-- D. WORK PREFERENCES -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-calendar-week me-2"></i>Work Preferences</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Preferred Work Type *</label>
                                            <select name="preferred_work_type" class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="full_time">Full Time</option>
                                                <option value="part_time">Part Time</option>
                                                <option value="temporary">Temporary</option>
                                                <option value="agency_shifts">Agency Shifts</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Preferred Shift Pattern *</label>
                                            <select name="preferred_shift_pattern" class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="day">Day Shift</option>
                                                <option value="night">Night Shift</option>
                                                <option value="rotational">Rotational</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-12 search-field">
                                            <label class="form-label">Preferred Work Location(s) *</label>
                                            <input type="text" name="preferred_location" class="form-control"
                                             placeholder="Type a location..." value="{{ request('location') }}" autocomplete="off"
                                              id="location-input" required>
                                             <div id="location-suggestions" class="autocomplete-suggestions"></div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Maximum Travel Distance (miles)</label>
                                            <input type="number" name="max_travel_distance" class="form-control" min="0">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Willing to Relocate?</label>
                                            <select name="willing_to_relocate" class="form-select">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Weekend Availability?</label>
                                            <select name="weekend_availability" class="form-select">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Available Start Date *</label>
                                            <input type="date" name="available_start_date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- F. CLINICAL SKILLS & COMPETENCIES -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-clipboard2-pulse me-2"></i>Clinical Skills & Competencies</h4>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label d-block">Select your competencies:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="clinical_skills[]" value="medication_administration">
                                                        <label class="form-check-label">Medication Administration Experience</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="clinical_skills[]" value="iv_therapy">
                                                        <label class="form-check-label">IV Therapy Experience</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="clinical_skills[]" value="patient_assessment">
                                                        <label class="form-check-label">Patient Assessment Skills</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="clinical_skills[]" value="ehr_experience">
                                                        <label class="form-check-label">Electronic Health Record Experience</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="clinical_skills[]" value="infection_control">
                                                        <label class="form-check-label">Infection Control Training</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="clinical_skills[]" value="life_support">
                                                        <label class="form-check-label">Life Support Certification</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="form-label">Additional Clinical Skills</label>
                                            <textarea name="cover_letter" class="form-control" rows="2" placeholder="List any additional clinical skills..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- G. EMPLOYMENT HISTORY -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-briefcase-history me-2"></i>Employment History</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Previous Employer</label>
                                            <input type="text" name="previous_employer" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Job Title</label>
                                            <input type="text" name="previous_job_title" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Employment Duration From</label>
                                            <input type="date" name="employment_from" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Employment Duration To</label>
                                            <input type="date" name="employment_to" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label class="form-label">Reason for Leaving</label>
                                            <input type="text" name="reason_for_leaving" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Professional Reference Name</label>
                                            <input type="text" name="reference_name" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Professional Reference Contact</label>
                                            <input type="text" name="reference_contact" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 4: DOCUMENTS & COMPLIANCE -->
                            <div class="step" id="step4" style="display: none;">
                                <!-- H. DOCUMENT UPLOADS -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-file-earmark-arrow-up me-2"></i>Document Uploads</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Nursing License Certificate *</label>
                                            <input type="file" name="nursing_license" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Degree Certificate *</label>
                                            <input type="file" name="degree_certificate" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Professional Certifications</label>
                                            <input type="file" name="professional_certifications" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Mandatory Training Certificates</label>
                                            <input type="file" name="training_certificates" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">CV / Resume *</label>
                                            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Proof of Address *</label>
                                            <input type="file" name="proof_of_address" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Passport Photograph *</label>
                                            <input type="file" name="photo" class="form-control" accept=".jpg,.jpeg,.png" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Government Id Upload</label>
                                            <input type="file" name="government_id_upload" class="form-control" accept=".jpg,.jpeg,.png">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Right To Work Upload (Optional)</label>
                                            <input type="file" name="right_to_work_upload" class="form-control" accept=".jpg,.jpeg,.png">
                                        </div>
                                    </div>
                                </div>

                                <!-- I. COMPLIANCE & DECLARATIONS -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-shield-check me-2"></i>Compliance & Declarations</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Right to Work in UK?</label>
                                            <select name="right_to_work_uk" class="form-select" required>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">DBS Check Status</label>
                                            <select name="dbs_check_status" class="form-select">
                                                <option value="available">Available</option>
                                                <option value="applied_for">Applied For</option>
                                                <option value="not_available">Not Available</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 5: REVIEW & SECURITY -->
                            <div class="step" id="step5" style="display: none;">
                                <!-- Review Summary -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-eye me-2"></i>Review Your Information</h4>
                                    <div class="alert alert-info">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Please review your information before submitting. You can go back to any section using the Previous button.
                                    </div>
                                    
                                    <div class="review-section p-3 bg-light rounded" id="reviewContent">
                                        <!-- Dynamically filled with JavaScript -->
                                    </div>
                                </div>

                                <!-- J. ACCOUNT SECURITY -->
                                <div class="form-section mb-4">
                                    <h4 class="text-success mb-3"><i class="bi bi-lock me-2"></i>Account Security</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Create Password *</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Confirm Password *</label>
                                            <input type="password" name="password_confirmation" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Declaration Checkbox -->
                                <div class="form-section mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="information_accurate" value="1" required id="declarationCheck">
                                        <label class="form-check-label fw-bold" for="declarationCheck">
                                            I confirm that all information provided is accurate and complete to the best of my knowledge. *
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Footer for Download -->
                            <div class="text-center text-muted small" id="formFooter" style="display: none;">
                                <div class="border-top pt-3 mt-3">
                                    <p>Generated on {{ date('F j, Y') }} | Nurse Registration Form</p>
                                    <p>{{ url()->current() }}</p>
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary px-4" id="prevBtn" onclick="changeStep(-1)" disabled>
                                    <i class="bi bi-arrow-left me-2"></i>Previous
                                </button>
                                
                                <div>
                                    <span class="text-muted me-3" id="stepCounter">Step 1 of 5</span>
                                    <button type="button" class="btn btn-success px-4" id="nextBtn" onclick="changeStep(1)">
                                        Next <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                    <button type="submit" class="btn btn-success px-5 rounded-pill" id="submitBtn" style="display: none;">
                                        <i class="bi bi-check2-circle me-2"></i> Submit Application
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QR CODE MODAL -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="qrModalLabel">
                    <i class="bi bi-qr-code-scan me-2"></i> Share this Registration Form
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-5">
                <div id="qrCodeContainer" class="mb-4">
                    <!-- QR Code will be generated here -->
                </div>
                <h6 class="fw-bold">Nurse Registration Form</h6>
                <p class="text-muted small mb-3">Scan this QR code to access the form directly</p>
                <div class="input-group mb-3">
                    <input type="text" id="currentUrl" class="form-control" value="{{ url()->current() }}" readonly>
                    <button class="btn btn-outline-success" type="button" onclick="copyUrl()">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" onclick="downloadQR()">
                        <i class="bi bi-download me-2"></i> Download QR Code
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- BENEFITS MODAL -->
<div class="modal fade benefits-modal" id="benefitsModal" tabindex="-1" aria-labelledby="benefitsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="benefits-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="benefits-title" id="benefitsModalLabel">
                            <i class="bi bi-patch-check-fill" style="color: #0b9b8a;"></i> Why join us?
                        </h3>
                        <p class="benefits-sub">Exclusive benefits tailored for your profession</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="role-tabs" id="roleTabContainer">
                    <button class="role-tab-btn active" data-role="nurse">
                        <i class="bi bi-heart-pulse"></i> Nurses
                    </button>
                    <button class="role-tab-btn" data-role="assistant">
                        <i class="bi bi-person-plus"></i> Healthcare Assistants
                    </button>
                </div>
            </div>
            
            <div class="benefits-body" id="benefitContentArea">
                <div id="nurse-benefits" class="benefit-section">
                    <div class="benefit-grid">
                        <div class="benefit-item">
                            <div class="benefit-icon"><i class="bi bi-calendar-check"></i></div>
                            <h5>Flexible scheduling</h5>
                            <p>Self-rostering, 12h shifts, and block booking – you control your roster.</p>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon"><i class="bi bi-shield-plus"></i></div>
                            <h5>Indemnity insurance</h5>
                            <p>Full malpractice cover + NHS pension continuation options.</p>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon"><i class="bi bi-house-heart"></i></div>
                            <h5>Relocation & accommodation</h5>
                            <p>Subsidised housing for international nurses + visa sponsorship.</p>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon"><i class="bi bi-people"></i></div>
                            <h5>Magnet® environment</h5>
                            <p>Work in accredited hospitals with shared governance and nurse-led research.</p>
                        </div>
                    </div>
                </div>
                
                <div id="assistant-benefits" class="benefit-section" style="display: none;">
                    <div class="benefit-grid">
                        <div class="benefit-item">
                            <div class="benefit-icon"><i class="bi bi-arrow-up-circle"></i></div>
                            <h5>Career ladder</h5>
                            <p>Clear HCA → Assistant Practitioner → Nurse Degree Apprenticeship.</p>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon"><i class="bi bi-clock-history"></i></div>
                            <h5>Flexible bank shifts</h5>
                            <p>Choose shifts via app; priority access to overtime.</p>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon"><i class="bi bi-credit-card"></i></div>
                            <h5>Blue Light Card & discounts</h5>
                            <p>Exclusive savings on retail, travel, and dining.</p>
                        </div>
                        <div class="benefit-item">
                            <div class="benefit-icon"><i class="bi bi-chat-heart"></i></div>
                            <h5>Wellbeing support</h5>
                            <p>24/7 employee assistance, mental health first aiders.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 text-muted d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2" style="color: #1b7e6f;"></i> 
                    <span>Plus 24/7 support, wellbeing programs, and instant access to our professional community.</span>
                </div>
            </div>
            
            <div class="p-4 bg-light border-0 d-flex justify-content-end rounded-bottom">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-5" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success rounded-pill px-5 ms-3" data-bs-dismiss="modal">Apply now</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Premium styles for the registration page */
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(145deg, #f1f7fc 0%, #e9f2f8 100%);
        color: #1a2e3b;
    }
    .card {
        border: none;
        backdrop-filter: blur(8px);
        background: rgba(255,255,255,0.95);
        box-shadow: 0 30px 50px -20px rgba(0,60,80,0.15);
    }
    .form-label {
        font-weight: 500;
        color: #1a4a5f;
        margin-bottom: 0.25rem;
        font-size: 0.9rem;
        letter-spacing: -0.01em;
    }
    .form-control, .form-select {
        border-radius: 14px;
        border: 1.5px solid #e2edf2;
        padding: 0.65rem 1rem;
        transition: all 0.2s;
        background: white;
    }
    .form-control:focus, .form-select:focus {
        border-color: #2d7f8f;
        box-shadow: 0 0 0 4px rgba(45,127,143,0.06);
    }
    .btn-success {
        background: linear-gradient(165deg, #1b7e6f, #0e6b5c);
        border: none;
        font-weight: 600;
        letter-spacing: 0.3px;
        padding: 14px 36px;
        transition: all 0.25s;
    }
    .btn-success:hover {
        background: linear-gradient(165deg, #146b5e, #0a584b);
        transform: scale(1.02);
        box-shadow: 0 15px 25px -8px rgba(20,107,94,0.3);
    }
    .btn-open-benefits {
        background: rgba(30,150,140,0.06);
        border: 1.5px dashed #1b7e6f;
        color: #0c5e5a;
        padding: 8px 22px;
        border-radius: 60px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.2s;
    }
    .btn-open-benefits:hover {
        background: rgba(27,126,111,0.1);
        border-color: #0c5e5a;
        color: #094c47;
    }
    .form-section {
        background: #ffffff;
        border: 1px solid rgba(45,127,143,0.1);
        border-radius: 20px;
        padding: 1.5rem;
    }
    
    /* Step Indicators */
    .step-indicators {
        position: relative;
        z-index: 1;
    }
    .step-item {
        flex: 1;
        text-align: center;
        position: relative;
    }
    .step-item:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 20px;
        right: -50%;
        width: 100%;
        height: 2px;
        background: #e2edf2;
        z-index: -1;
    }
    .step-item.active:not(:last-child)::after {
        background: #1b7e6f;
    }
    .step-circle {
        width: 40px;
        height: 40px;
        background: #e2edf2;
        color: #1a4a5f;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .step-item.active .step-circle {
        background: #1b7e6f;
        color: white;
        box-shadow: 0 5px 15px rgba(27,126,111,0.3);
    }
    .step-item.completed .step-circle {
        background: #1b7e6f;
        color: white;
    }
    .step-label {
        font-size: 0.85rem;
        font-weight: 500;
        color: #1a4a5f;
    }
    .step-item.active .step-label {
        color: #1b7e6f;
        font-weight: 600;
    }
    
    /* Progress Bar */
    .progress {
        background: #e2edf2;
        border-radius: 10px;
    }
    .progress-bar {
        background: linear-gradient(90deg, #1b7e6f, #2d9f8c);
        border-radius: 10px;
        transition: width 0.3s ease;
    }
    
    /* Review Section */
    .review-section {
        max-height: 300px;
        overflow-y: auto;
    }
    .review-item {
        padding: 0.5rem;
        border-bottom: 1px solid #dee2e6;
    }
    .review-item:last-child {
        border-bottom: none;
    }
    .review-label {
        font-weight: 600;
        color: #1a4a5f;
        font-size: 0.9rem;
    }
    .review-value {
        color: #2c3e50;
    }
    
    /* Modal styles */
    .benefits-modal .modal-content {
        border: none;
        border-radius: 36px;
        background: white;
        box-shadow: 0 40px 70px -20px rgba(0,50,70,0.2);
        overflow: hidden;
        padding: 0.5rem;
    }
    .benefits-header {
        background: linear-gradient(105deg, #f0fafc 0%, #e6f3f7 100%);
        padding: 2rem 2rem 1.5rem;
        border-bottom: 1px solid rgba(30,130,140,0.08);
    }
    .benefits-title {
        font-size: 2rem;
        font-weight: 700;
        color: #0a4c5c;
        letter-spacing: -0.02em;
    }
    .benefits-sub {
        color: #2f6d7a;
        font-size: 1.1rem;
    }
    .role-tabs {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        border-bottom: none;
    }
    .role-tab-btn {
        background: transparent;
        border: none;
        padding: 14px 24px;
        border-radius: 100px;
        font-weight: 600;
        color: #1e5a67;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.05rem;
    }
    .role-tab-btn.active {
        background: white;
        color: #0d5e64;
        box-shadow: 0 6px 18px rgba(20,110,120,0.12);
    }
    .role-tab-btn i {
        font-size: 1.3rem;
    }
    .benefits-body {
        padding: 2rem;
    }
    .benefit-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.2rem;
    }
    .benefit-item {
        background: #f8fdff;
        padding: 1.2rem 1.2rem;
        border-radius: 24px;
        border: 1px solid rgba(50,150,160,0.08);
        transition: all 0.2s;
    }
    .benefit-item:hover {
        background: white;
        border-color: #a3d0d6;
        box-shadow: 0 8px 14px rgba(30,140,150,0.06);
    }
    .benefit-icon {
        background: #daf2f0;
        width: 44px;
        height: 44px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0b6b6b;
        font-size: 1.4rem;
        margin-bottom: 1rem;
    }
    .benefit-item h5 {
        font-weight: 700;
        color: #0c4a55;
        margin-bottom: 8px;
    }
    .benefit-item p {
        color: #2e5c66;
        margin-bottom: 0;
        font-size: 0.95rem;
        opacity: 0.9;
    }
    
    /* QR Code styles */
    #qrCodeContainer canvas {
        border-radius: 20px;
        padding: 15px;
        background: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        max-width: 200px;
        height: auto;
        margin: 0 auto;
    }
    
    /* Dropdown styles */
    .dropdown-menu {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 0.5rem;
    }
    .dropdown-item {
        border-radius: 10px;
        padding: 0.5rem 1rem;
        transition: all 0.2s;
    }
    .dropdown-item:hover {
        background: rgba(27,126,111,0.1);
        color: #0e6b5c;
    }
    
    /* Print styles */
    @media print {
        .btn-open-benefits, .btn-group, .btn-success, .alert, .modal, .step-indicators, .progress, #prevBtn, #nextBtn {
            display: none !important;
        }
        .card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }
        .step {
            display: block !important;
        }
        #formFooter {
            display: block !important;
        }
    }
    
    @media (max-width: 768px) {
        .benefit-grid { grid-template-columns: 1fr; }
        .benefits-title { font-size: 1.8rem; }
        .step-label {
            font-size: 0.7rem;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    let currentStep = 1;
    const totalSteps = 5;

    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching for benefits modal
        const tabButtons = document.querySelectorAll('.role-tab-btn');
        const sections = {
            nurse: document.getElementById('nurse-benefits'),
            assistant: document.getElementById('assistant-benefits')
        };

        function activateRole(role) {
            Object.values(sections).forEach(section => {
                if (section) section.style.display = 'none';
            });
            if (sections[role]) sections[role].style.display = 'block';
            
            tabButtons.forEach(btn => btn.classList.remove('active'));
            const activeBtn = Array.from(tabButtons).find(btn => btn.dataset.role === role);
            if (activeBtn) activeBtn.classList.add('active');
        }

        tabButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const role = this.dataset.role;
                activateRole(role);
            });
        });

        // Generate QR Code when modal opens
        $('#qrModal').on('shown.bs.modal', function() {
            generateQRCode();
        });

        // Initialize form with saved data if any
        loadFormData();
        
        // Add input listeners to save data
        addSaveListeners();
    });

    // Step navigation
    function changeStep(direction) {
        if (direction > 0) {
            // Validate current step before proceeding
            if (!validateStep(currentStep)) {
                return;
            }
        }
        
        // Hide current step
        document.getElementById(`step${currentStep}`).style.display = 'none';
        
        // Update step indicators
        document.getElementById(`step${currentStep}-indicator`).classList.remove('active');
        if (direction > 0) {
            document.getElementById(`step${currentStep}-indicator`).classList.add('completed');
        }
        
        // Change step
        currentStep += direction;
        
        // Show new step
        document.getElementById(`step${currentStep}`).style.display = 'block';
        document.getElementById(`step${currentStep}-indicator`).classList.add('active');
        
        // Update progress bar
        const progress = (currentStep / totalSteps) * 100;
        document.getElementById('progressBar').style.width = progress + '%';
        document.getElementById('progressBar').setAttribute('aria-valuenow', progress);
        
        // Update step counter
        document.getElementById('stepCounter').textContent = `Step ${currentStep} of ${totalSteps}`;
        
        // Update buttons
        document.getElementById('prevBtn').disabled = currentStep === 1;
        
        if (currentStep === totalSteps) {
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('submitBtn').style.display = 'inline-block';
            generateReview();
        } else {
            document.getElementById('nextBtn').style.display = 'inline-block';
            document.getElementById('submitBtn').style.display = 'none';
        }
    }

    // Validate current step
    function validateStep(step) {
        const stepElement = document.getElementById(`step${step}`);
        const requiredFields = stepElement.querySelectorAll('[required]');
        let isValid = true;
        let firstInvalid = null;
        
        requiredFields.forEach(field => {
            if (!field.value) {
                field.classList.add('is-invalid');
                isValid = false;
                if (!firstInvalid) firstInvalid = field;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        if (!isValid) {
            showNotice('Please fill in all required fields before proceeding.', true);
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
        
        return isValid;
    }

    // Generate review summary
    function generateReview() {
        const form = document.getElementById('nurseForm');
        const formData = new FormData(form);
        let reviewHtml = '<div class="row">';
        
        // Group fields by category
        const categories = {
            'Personal Information': ['name', 'role', 'date_of_birth', 'gender', 'nationality', 'phone', 'alternative_phone', 'email', 'address', 'city', 'postcode', 'country_of_residence'],
            'Emergency Contact': ['emergency_contact_name', 'emergency_contact_phone', 'emergency_contact_relationship'],
            'Identification': ['government_id_type', 'government_id_number', 'government_id_expiry', 'national_insurance_number'],
            'Professional': ['professional_title', 'license_number', 'licensing_authority', 'license_issue_date', 'license_expiry_date', 'years_of_experience', 'clinical_specialisation', 'care_specialty', 'employment_status'],
            'Qualifications': ['highest_qualification', 'institution', 'country_of_qualification', 'graduation_year', 'english_language_qualification'],
            'Work Preferences': ['preferred_work_type', 'preferred_shift_pattern', 'preferred_location', 'max_travel_distance', 'willing_to_relocate', 'weekend_availability', 'available_start_date'],
            'Documents': ['nursing_license', 'degree_certificate', 'professional_certifications', 'training_certificates', 'resume', 'proof_of_address', 'photo']
        };
        
        for (const [category, fields] of Object.entries(categories)) {
            reviewHtml += `<div class="col-md-6 mb-3"><strong>${category}:</strong><br>`;
            let hasValue = false;
            
            fields.forEach(field => {
                const value = formData.get(field);
                if (value && typeof value === 'string' && value.trim()) {
                    const label = field.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                    reviewHtml += `<span class="review-item"><span class="review-label">${label}:</span> <span class="review-value">${value}</span></span><br>`;
                    hasValue = true;
                }
            });
            
            if (!hasValue) {
                reviewHtml += '<span class="text-muted">Not provided</span>';
            }
            reviewHtml += '</div>';
        }
        
        reviewHtml += '</div>';
        document.getElementById('reviewContent').innerHTML = reviewHtml;
    }

    // Save form data to localStorage
    function addSaveListeners() {
        const form = document.getElementById('nurseForm');
        const inputs = form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                saveFormData();
            });
            input.addEventListener('keyup', function() {
                saveFormData();
            });
        });
    }

    function saveFormData() {
        const form = document.getElementById('nurseForm');
        const formData = new FormData(form);
        const data = {};
        
        for (const [key, value] of formData.entries()) {
            if (value instanceof File) {
                if (value.name) {
                    data[key] = '[File uploaded]';
                }
            } else {
                data[key] = value;
            }
        }
        
        localStorage.setItem('nurseFormData', JSON.stringify(data));
    }

    function loadFormData() {
        const savedData = localStorage.getItem('nurseFormData');
        if (savedData) {
            try {
                const data = JSON.parse(savedData);
                const form = document.getElementById('nurseForm');
                
                for (const [key, value] of Object.entries(data)) {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input && input.type !== 'file' && input.type !== 'checkbox') {
                        input.value = value;
                    } else if (input && input.type === 'checkbox' && value === 'on') {
                        input.checked = true;
                    }
                }
                
                showNotice('Saved form data loaded successfully!');
            } catch (e) {
                console.error('Error loading saved data:', e);
            }
        }
    }

    // QR Code functions
    function generateQRCode() {
        const container = document.getElementById('qrCodeContainer');
        const url = window.location.href;
        
        container.innerHTML = '';
        
        new QRCode(container, {
            text: url,
            width: 200,
            height: 200,
            colorDark: '#1b7e6f',
            colorLight: '#ffffff',
            correctLevel: QRCode.CorrectLevel.H
        });
    }

    function copyUrl() {
        const urlInput = document.getElementById('currentUrl');
        urlInput.select();
        document.execCommand('copy');
        
        const button = event.target.closest('button');
        const originalHtml = button.innerHTML;
        button.innerHTML = '<i class="bi bi-check"></i>';
        setTimeout(() => {
            button.innerHTML = originalHtml;
        }, 2000);
    }

    function downloadQR() {
        const canvas = document.querySelector('#qrCodeContainer canvas');
        if (canvas) {
            const link = document.createElement('a');
            link.download = 'nurse-registration-qr.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        }
    }

    // Download functions
    function showNotice(message, isError = false) {
        const notice = document.getElementById('downloadNotice');
        const messageEl = document.getElementById('downloadMessage');
        messageEl.textContent = message;
        notice.className = `alert alert-${isError ? 'danger' : 'info'} alert-dismissible fade show mb-4`;
        notice.style.display = 'block';
        
        setTimeout(() => {
            notice.style.display = 'none';
        }, 5000);
    }

    async function downloadAsImage() {
        try {
            showNotice('Preparing image download...');
            
            // Show all steps temporarily for capture
            const steps = document.querySelectorAll('.step');
            steps.forEach(step => step.style.display = 'block');
            
            const element = document.getElementById('registrationForm');
            
            const canvas = await html2canvas(element, {
                scale: 2,
                backgroundColor: '#ffffff',
                logging: false,
                allowTaint: false,
                useCORS: true
            });
            
            // Restore step visibility
            steps.forEach(step => step.style.display = 'none');
            document.getElementById(`step${currentStep}`).style.display = 'block';
            
            const link = document.createElement('a');
            link.download = `nurse-registration-${new Date().toISOString().slice(0,10)}.png`;
            link.href = canvas.toDataURL('image/png');
            link.click();
            
            showNotice('Image downloaded successfully!');
        } catch (error) {
            console.error('Error downloading image:', error);
            showNotice('Error downloading image. Please try again.', true);
        }
    }

    async function downloadAsPDF() {
        try {
            showNotice('Preparing PDF download...');
            
            const { jsPDF } = window.jspdf;
            
            // Show all steps temporarily for capture
            const steps = document.querySelectorAll('.step');
            steps.forEach(step => step.style.display = 'block');
            
            const element = document.getElementById('registrationForm');
            
            const canvas = await html2canvas(element, {
                scale: 2,
                backgroundColor: '#ffffff',
                logging: false,
                allowTaint: false,
                useCORS: true
            });
            
            // Restore step visibility
            steps.forEach(step => step.style.display = 'none');
            document.getElementById(`step${currentStep}`).style.display = 'block';
            
            const imgData = canvas.toDataURL('image/png');
            
            const imgWidth = 210;
            const pageHeight = 297;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;
            
            const pdf = new jsPDF({
                orientation: imgHeight > pageHeight ? 'portrait' : 'portrait',
                unit: 'mm'
            });
            
            pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
            pdf.save(`nurse-registration-${new Date().toISOString().slice(0,10)}.pdf`);
            
            showNotice('PDF downloaded successfully!');
        } catch (error) {
            console.error('Error downloading PDF:', error);
            showNotice('Error downloading PDF. Please try again.', true);
        }
    }

    function printForm() {
        // Show all steps for printing
        const steps = document.querySelectorAll('.step');
        steps.forEach(step => step.style.display = 'block');
        document.getElementById('formFooter').style.display = 'block';
        
        window.print();
        
        // Restore step visibility
        steps.forEach(step => step.style.display = 'none');
        document.getElementById(`step${currentStep}`).style.display = 'block';
        document.getElementById('formFooter').style.display = 'none';
    }

    // Clear saved form data on successful submission
    document.getElementById('nurseForm').addEventListener('submit', function() {
        localStorage.removeItem('nurseFormData');
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const locations = @json($locations); // Laravel array of locations
    const input = document.getElementById('location-input');
    const suggestionBox = document.getElementById('location-suggestions');

    input.addEventListener('input', function() {
        const value = this.value.toLowerCase();
        suggestionBox.innerHTML = '';
        if (!value) return;

        const filtered = locations.filter(city => city.toLowerCase().includes(value));
        filtered.forEach(city => {
            const div = document.createElement('div');
            div.classList.add('autocomplete-suggestion');
            div.textContent = city;
            div.addEventListener('click', function() {
                input.value = city;
                suggestionBox.innerHTML = '';
            });
            suggestionBox.appendChild(div);
        });
    });

    // Close suggestions if clicked outside
    document.addEventListener('click', function(e) {
        if (e.target !== input) {
            suggestionBox.innerHTML = '';
        }
    });
});
</script>
@endpush