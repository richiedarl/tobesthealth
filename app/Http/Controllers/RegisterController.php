<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\HcaDetails; // Add this import
use App\Models\Application;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\AdminStaffNotification;
use App\Mail\AdminApplicationNotification;

class RegisterController extends Controller
{
    /**
     * Show Nurse Registration Form
     */
    public function showNurseForm()
    {
        // Get unique locations from existing offers
        $offerLocations = Offer::whereNotNull('location')
                               ->where('location', '!=', '')
                               ->distinct()
                               ->orderBy('location')
                               ->pluck('location')
                               ->toArray();

        // Get full UK city list from config
        $ukCities = config('uk_cities.cities');

        // Merge and remove duplicates
        $locations = array_unique(array_merge($ukCities, $offerLocations));
        sort($locations);

        return view('register.nurse', compact('locations'));
    }
    
    /**
     * Show HCA Registration Form
     */
    public function showHcaForm()
    {
        // Get full UK city list from config
        $ukCities = config('uk_cities.cities');

        // Merge and remove duplicates
        $locations = array_unique(array_merge($ukCities));
        sort($locations);

        return view('register.hca', compact('locations'));
    }

    /**
     * Handle Nurse/HCA Registration
     */
   /**
 * Handle Nurse/HCA Registration
 */
public function storeNewRegister(Request $request)
{
    // Force location to match preferred_location
    $request->merge([
        'location' => $request->preferred_location,
    ]);

    // Determine validation rules based on role
    $rules = $this->getValidationRules($request->role);
    $data = $request->validate($rules);

    try {
        DB::transaction(function () use ($data, $request) {
            // Create staff profile (this works for both nurses and HCAs)
            $staff = $this->createStaffProfile($data, $request);

            $hcaDetails = null;
            
            // If HCA, create separate HCA details record
            if ($data['role'] === 'healthcare_worker') {
                $hcaDetails = $this->createHcaDetails($data, $staff, $request);
            }

            // Create application record (works for both)
            $this->createApplication($data, $staff, $request);
            
            // Send email notification to admin
            $this->sendAdminNotification($staff, $data, $request, $hcaDetails);
        });

        return redirect()
            ->back()
            ->with('success', $this->getSuccessMessage($request->role));
            
    } catch (\Exception $e) {
        \Log::error('Registration failed: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());
        
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'An error occurred while processing your application. Please try again. Error: ' . $e->getMessage());
    }
}
/**
 * Send email notification to admin with PDF and image attachments
 */
private function sendAdminNotification($staff, $data, $request, $hcaDetails = null)
{
    try {
        $applicationType = $data['role'] === 'nurse' ? 'nurse' : 'healthcare_worker';
        
        // Get admin email from config or settings
        $adminEmail = config('mail.admin_address', 'admin@example.com');
        
        \Mail::to($adminEmail)->send(new \App\Mail\AdminStaffNotification(
            $staff,
            $data,
            $applicationType,
            $hcaDetails
        ));
        
        \Log::info('Admin notification sent for application ID: ' . $staff->id);
    } catch (\Exception $e) {
        \Log::error('Failed to send admin notification: ' . $e->getMessage());
    }
}
    private function getValidationRules($role)
    {
        $baseRules = [
            'role' => ['required', 'in:nurse,healthcare_worker'],
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female,other'],
            'nationality' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'alternative_phone' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:staff,email'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:20'],
            'country_of_residence' => ['required', 'string', 'max:255'],
            'emergency_contact_name' => ['required', 'string', 'max:255'],
            'emergency_contact_phone' => ['required', 'string', 'max:20'],
            'emergency_contact_relationship' => ['required', 'string', 'max:255'],
            
            // Identification
            'government_id_type' => ['required', 'string', 'in:passport,national_id,drivers_license,brp'],
            'government_id_number' => ['required', 'string', 'max:255'],
            'government_id_expiry' => ['required', 'date'],
            'government_id_upload' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
            'national_insurance_number' => ['nullable', 'string', 'max:255'],
            'right_to_work_upload' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
            
            // Work Preferences (common)
            'preferred_location' => ['required', 'string', 'max:255'],
            'max_travel_distance' => ['nullable', 'integer', 'min:0'],
            'willing_to_relocate' => ['sometimes', 'boolean'],
            'weekend_availability' => ['sometimes', 'boolean'],
            'available_start_date' => ['required', 'date'],
            
            // Documents
            'photo' => ['required', 'image', 'max:4048'],
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
            'proof_of_address' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4048'],
            
            // Compliance
            'right_to_work_uk' => ['required', 'boolean'],
            'dbs_check_status' => ['nullable', 'string', 'in:available,applied_for,not_available'],
            'information_accurate' => ['required', 'accepted'],
            
            // Account
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        // NURSE VALIDATION - UNCHANGED
        if ($role === 'nurse') {
            return array_merge($baseRules, [
                'professional_title' => ['required', 'string', 'max:255'],
                'license_number' => ['required', 'string', 'max:255'],
                'licensing_authority' => ['required', 'string', 'max:255'],
                'license_issue_date' => ['required', 'date'],
                'license_expiry_date' => ['required', 'date', 'after:license_issue_date'],
                'years_of_experience' => ['required', 'integer', 'min:0'],
                'clinical_specialisation' => ['required', 'string', 'max:255'],
                'care_specialty' => ['nullable', 'string', 'max:255'],
                'employment_status' => ['required', 'string', 'in:employed,self_employed,agency_staff,unemployed'],
                'preferred_work_type' => ['required', 'string', 'in:full_time,part_time,temporary,agency_shifts'],
                'preferred_shift_pattern' => ['required', 'string', 'in:day,night,rotational'],
                'highest_qualification' => ['required', 'string', 'max:255'],
                'institution' => ['required', 'string', 'max:255'],
                'country_of_qualification' => ['required', 'string', 'max:255'],
                'graduation_year' => ['required', 'integer', 'min:1950', 'max:' . date('Y')],
                'english_language_qualification' => ['nullable', 'string', 'max:255'],
                'clinical_skills' => ['nullable', 'array'],
                'clinical_skills.*' => ['string'],
                'cover_letter' => ['nullable', 'string'],
                'nursing_license' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
                'degree_certificate' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
                'professional_certifications' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
                'training_certificates' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
            ]);
        }

        // HCA VALIDATION - UPDATED with correct field names
        if ($role === 'healthcare_worker') {
            return array_merge($baseRules, [
                'role_type' => ['required', 'string', 'in:Healthcare Assistant,Support Worker,Caregiver,Home Care Assistant'],
                'years_of_experience' => ['required', 'integer', 'min:0'],
                'previous_care_settings' => ['required', 'array', 'min:1'],
                'previous_care_settings.*' => ['string', 'in:hospital,care_home,home_care,private_client,supported_living'],
                'employment_status' => ['required', 'string', 'in:employed,self_employed,agency_staff,unemployed'],
                'manual_handling_training' => ['sometimes', 'boolean'],
                'first_aid_training' => ['sometimes', 'boolean'],
                'safeguarding_training' => ['sometimes', 'boolean'],
                'medication_assistance_experience' => ['sometimes', 'boolean'],
                'dementia_care_experience' => ['sometimes', 'boolean'],
                'personal_care_experience' => ['sometimes', 'boolean'],
                'infection_prevention_training' => ['sometimes', 'boolean'],
                'additional_hca_skills' => ['nullable', 'string'],
                'preferred_shift_type' => ['required', 'string', 'in:day,night,flexible'],
            ]);
        }

        return $baseRules;
    }

    private function createStaffProfile($data, $request)
    {
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('staff/photos', 'public');
        }

        // Handle document uploads
        $documentUploads = [];
        $documentFields = ['government_id_upload', 'right_to_work_upload', 'resume', 'proof_of_address'];
        
        if ($data['role'] === 'nurse') {
            $documentFields = array_merge($documentFields, [
                'nursing_license', 'degree_certificate', 'professional_certifications', 'training_certificates'
            ]);
        }
        
        foreach ($documentFields as $field) {
            if ($request->hasFile($field)) {
                $documentUploads[$field] = $request->file($field)->store('staff/documents/' . $field, 'public');
            }
        }

        $roleDisplay = $data['role'] === 'nurse' ? 'Nurse' : 'Healthcare Assistant';

        $staffData = [
            'full_name' => $data['name'],
            'date_of_birth' => $data['date_of_birth'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'alternative_phone' => $data['alternative_phone'] ?? null,
            'gender' => $data['gender'],
            'nationality' => $data['nationality'],
            'address' => $data['address'],
            'city' => $data['city'],
            'postcode' => $data['postcode'],
            'country_of_residence' => $data['country_of_residence'],
            'emergency_contact_name' => $data['emergency_contact_name'],
            'emergency_contact_phone' => $data['emergency_contact_phone'],
            'emergency_contact_relationship' => $data['emergency_contact_relationship'],
            
            // Identification
            'government_id_type' => $data['government_id_type'],
            'government_id_number' => $data['government_id_number'],
            'government_id_expiry' => $data['government_id_expiry'],
            'government_id_upload' => $documentUploads['government_id_upload'] ?? null,
            'national_insurance_number' => $data['national_insurance_number'] ?? null,
            'right_to_work_upload' => $documentUploads['right_to_work_upload'] ?? null,
            
            // Role
            'role' => $roleDisplay,
            'years_of_experience' => $data['years_of_experience'] ?? 0,
            
            // Work Preferences
            'location' => $data['preferred_location'] ?? null,
            'max_travel_distance' => $data['max_travel_distance'] ?? null,
            'willing_to_relocate' => $request->has('willing_to_relocate'),
            'weekend_availability' => $request->has('weekend_availability'),
            'available_start_date' => $data['available_start_date'] ?? null,
            
            // Photo
            'photo' => $photoPath,
            
            // Documents JSON
            'document_uploads' => json_encode($documentUploads),
            
            // Compliance
            'right_to_work_uk' => $data['right_to_work_uk'] ?? false,
            'dbs_check_status' => $data['dbs_check_status'] ?? null,
            
            // Status
            'is_available' => true,
            'availability_type' => $data['preferred_work_type'] ?? 'full_time',
            'is_active' => false,
            'is_featured' => false,
        ];

        // NURSE-SPECIFIC FIELDS - UNCHANGED
        if ($data['role'] === 'nurse') {
            $staffData = array_merge($staffData, [
                'professional_title' => $data['professional_title'] ?? null,
                'nursing_level' => $data['professional_title'] ?? null,
                'license_number' => $data['license_number'] ?? null,
                'licensing_authority' => $data['licensing_authority'] ?? null,
                'license_issue_date' => $data['license_issue_date'] ?? null,
                'license_expiry_date' => $data['license_expiry_date'] ?? null,
                'license_verified' => false,
                'care_specialty' => $data['care_specialty'] ?? $data['clinical_specialisation'] ?? null,
                'clinical_specialisation' => $data['clinical_specialisation'] ?? null,
                'employment_status' => $data['employment_status'] ?? null,
                'preferred_work_type' => $data['preferred_work_type'] ?? null,
                'preferred_shift_pattern' => $data['preferred_shift_pattern'] ?? null,
                'highest_qualification' => $data['highest_qualification'] ?? null,
                'institution' => $data['institution'] ?? null,
                'country_of_qualification' => $data['country_of_qualification'] ?? null,
                'graduation_year' => $data['graduation_year'] ?? null,
                'english_language_qualification' => $data['english_language_qualification'] ?? null,
                'clinical_skills' => isset($data['clinical_skills']) ? json_encode($data['clinical_skills']) : null,
                'bio' => $data['cover_letter'] ?? null,
                'skills' => isset($data['clinical_skills']) ? $data['clinical_skills'] : [],
            ]);
        }

        return Staff::create($staffData);
    }

    /**
     * Create HCA Details in the separate hca_details table
     */
    private function createHcaDetails($data, $staff, $request)
    {
        // Prepare employment history from form data
        $employmentHistory = [];
        if (!empty($data['previous_employer']) || !empty($data['previous_job_title'])) {
            $employmentHistory[] = [
                'employer' => $data['previous_employer'] ?? null,
                'role' => $data['previous_job_title'] ?? null,
                'from' => $data['employment_from'] ?? null,
                'to' => $data['employment_to'] ?? null,
                'reason_for_leaving' => $data['reason_for_leaving'] ?? null,
                'reference_name' => $data['reference_name'] ?? null,
                'reference_contact' => $data['reference_contact'] ?? null,
            ];
        }

        $hcaDetails = [
            'staff_id' => $staff->id,
            'full_name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role_type' => $data['role_type'] ?? null,
            'years_of_experience' => $data['years_of_experience'] ?? 0,
            'previous_care_settings' => isset($data['previous_care_settings']) ? json_encode($data['previous_care_settings']) : null,
            'employment_status' => $data['employment_status'] ?? null,
            'manual_handling_training' => $request->has('manual_handling_training'),
            'first_aid_training' => $request->has('first_aid_training'),
            'safeguarding_training' => $request->has('safeguarding_training'),
            'medication_assistance_experience' => $request->has('medication_assistance_experience'),
            'dementia_care_experience' => $request->has('dementia_care_experience'),
            'personal_care_experience' => $request->has('personal_care_experience'),
            'infection_prevention_training' => $request->has('infection_prevention_training'),
            'additional_hca_skills' => $data['additional_hca_skills'] ?? null,
            'preferred_shift_type' => $data['preferred_shift_type'] ?? null,
            'preferred_location' => $data['preferred_location'] ?? null,
            'max_travel_distance' => $data['max_travel_distance'] ?? null,
            'willing_to_relocate' => $request->has('willing_to_relocate'),
            'weekend_availability' => $request->has('weekend_availability'),
            'available_start_date' => $data['available_start_date'] ?? null,
            'employment_history' => !empty($employmentHistory) ? json_encode($employmentHistory) : null,
        ];

        return HcaDetails::create($hcaDetails);
    }

    private function createApplication($data, $staff, $request)
    {
        $applicationData = [
            'staff_id' => $staff->id,
            'candidate_id' => null,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'experience_level' => $this->determineExperienceLevel($data['years_of_experience'] ?? 0),
            'additional_info' => $data['additional_info'] ?? null,
            'resume' => $staff->document_uploads ? json_decode($staff->document_uploads, true)['resume'] ?? 'staff-profile' : 'staff-profile',
            'status' => 'submitted',
            'opened_at' => 0,
        ];

        if ($data['role'] === 'nurse' && isset($data['cover_letter'])) {
            $applicationData['cover_letter'] = $data['cover_letter'];
        }

        return Application::create($applicationData);
    }

    private function determineExperienceLevel($years)
    {
        if ($years < 2) return 'Entry Level';
        if ($years < 5) return 'Mid Level';
        return 'Senior Level';
    }

    private function getSuccessMessage($role)
    {
        return match($role) {
            'nurse' => 'Your nursing application has been submitted successfully. Our team will review it shortly.',
            'healthcare_worker' => 'Your healthcare assistant application has been submitted successfully. Our team will review it shortly.',
            default => 'Your application has been submitted successfully. Our team will review it shortly.'
        };
    }
}