<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $table = 'staff';

    protected $fillable = [
        // IDENTITY & PERSONAL
        'full_name',
        'date_of_birth',
        'email',
        'phone',
        'alternative_phone',
        'gender',
        'nationality',
        'address',
        'city',
        'postcode',
        'country_of_residence',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        
        // IDENTIFICATION
        'government_id_type',
        'government_id_number',
        'government_id_expiry',
        'government_id_upload',
        'national_insurance_number',
        'right_to_work_upload',
        
        // PROFESSIONAL (NURSE)
        'role',
        'approved',
        'professional_title',
        'nursing_level',
        'years_of_experience',
        'care_specialty',
        'clinical_specialisation',
        'employment_status',
        
        // CREDENTIALS
        'license_number',
        'licensing_authority',
        'license_issue_date',
        'license_expiry_date',
        'license_verified',
        
        // WORK PREFERENCES
        'preferred_work_type',
        'preferred_shift_pattern',
        'preferred_location',
        'max_travel_distance',
        'willing_to_relocate',
        'weekend_availability',
        'available_start_date',
        'is_available',
        'availability_type',
        
        // QUALIFICATIONS & EDUCATION
        'highest_qualification',
        'institution',
        'country_of_qualification',
        'graduation_year',
        'english_language_qualification',
        
        // SKILLS & COMPETENCIES
        'skills',
        'clinical_skills',
        'life_support_certification',
        'bio',
        
        // EMPLOYMENT HISTORY
        'employment_history',
        
        // DOCUMENTS
        'photo',
        'document_uploads',
        
        // COMPLIANCE
        'right_to_work_uk',
        'dbs_check_status',
        'information_accurate',
        
        // HCA-SPECIFIC FIELDS
        'hca_role_type',
        'hca_previous_care_settings',
        'hca_manual_handling_training',
        'hca_first_aid_training',
        'hca_safeguarding_training',
        'hca_medication_assistance_experience',
        'hca_dementia_care_experience',
        'hca_personal_care_experience',
        'hca_infection_prevention_training',
        'hca_additional_skills',
        'hca_preferred_shift_type',
        
        // PLATFORM CONTROL
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'skills'                         => 'array',
        'clinical_skills'                 => 'array',
        'life_support_certification'      => 'array',
        'employment_history'               => 'array',
        'document_uploads'                 => 'array',
        'hca_previous_care_settings'       => 'array',
        'hca_additional_skills'            => 'array',
        
        'license_verified'                 => 'boolean',
        'is_available'                      => 'boolean',
        'is_active'                         => 'boolean',
        'is_featured'                       => 'boolean',
        'willing_to_relocate'                => 'boolean',
        'weekend_availability'                => 'boolean',
        'right_to_work_uk'                    => 'boolean',
        'information_accurate'                 => 'boolean',
        'hca_manual_handling_training'         => 'boolean',
        'hca_first_aid_training'               => 'boolean',
        'hca_safeguarding_training'            => 'boolean',
        'hca_medication_assistance_experience' => 'boolean',
        'hca_dementia_care_experience'         => 'boolean',
        'hca_personal_care_experience'         => 'boolean',
        'hca_infection_prevention_training'    => 'boolean',
        
        'years_of_experience' => 'integer',
        'max_travel_distance' => 'integer',
        'graduation_year'     => 'integer',
        'date_of_birth'       => 'date',
        'government_id_expiry' => 'date',
        'license_issue_date'   => 'date',
        'license_expiry_date'  => 'date',
        'available_start_date' => 'date',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // In app/Models/Staff.php

public function hcaDetails()
{
    return $this->hasOne(HcaDetails::class);
}

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getFullAddressAttribute()
    {
        return implode(', ', array_filter([
            $this->address,
            $this->city,
            $this->postcode,
            $this->country_of_residence
        ]));
    }

    public function getDocumentUrlAttribute($field)
    {
        $documents = json_decode($this->document_uploads, true) ?? [];
        return isset($documents[$field]) ? asset('storage/' . $documents[$field]) : null;
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeNurses($query)
    {
        return $query->where('role', 'Nurse');
    }

    public function scopeHealthcareAssistants($query)
    {
        return $query->where('role', 'Healthcare Assistant');
    }

    public function scopeWithValidLicense($query)
    {
        return $query->where('license_verified', true)
                     ->where('license_expiry_date', '>=', now());
    }

    public function scopeAvailableFrom($query, $date)
    {
        return $query->where('available_start_date', '<=', $date);
    }
}