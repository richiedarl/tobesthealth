<?php
// app/Models/HcaDetails.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HcaDetails extends Model
{
    protected $table = 'hca_details';

    protected $fillable = [
        'staff_id',
        'full_name',
        'email',
        'phone',
        'role_type',
        'years_of_experience',
        'previous_care_settings',
        'employment_status',
        'manual_handling_training',
        'first_aid_training',
        'safeguarding_training',
        'medication_assistance_experience',
        'dementia_care_experience',
        'personal_care_experience',
        'infection_prevention_training',
        'additional_hca_skills',
        'preferred_shift_type',
        'preferred_location',
        'max_travel_distance',
        'willing_to_relocate',
        'weekend_availability',
        'available_start_date',
        'employment_history',
    ];

    protected $casts = [
        'previous_care_settings' => 'array',
        'employment_history' => 'array',
        'manual_handling_training' => 'boolean',
        'first_aid_training' => 'boolean',
        'safeguarding_training' => 'boolean',
        'medication_assistance_experience' => 'boolean',
        'dementia_care_experience' => 'boolean',
        'personal_care_experience' => 'boolean',
        'infection_prevention_training' => 'boolean',
        'willing_to_relocate' => 'boolean',
        'weekend_availability' => 'boolean',
        'years_of_experience' => 'integer',
        'max_travel_distance' => 'integer',
        'available_start_date' => 'date',
    ];

    /**
     * Get the staff record associated with the HCA details.
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}