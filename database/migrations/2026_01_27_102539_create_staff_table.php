<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            // Personal Information
            $table->date('date_of_birth')->nullable()->after('full_name');
            $table->string('nationality')->nullable()->after('gender');
            $table->string('alternative_phone')->nullable()->after('phone');
            $table->string('address')->nullable()->after('email');
            $table->string('city')->nullable()->after('address');
            $table->string('postcode')->nullable()->after('city');
            $table->string('country_of_residence')->nullable()->after('postcode');
            $table->string('emergency_contact_name')->nullable()->after('country_of_residence');
            $table->string('emergency_contact_phone')->nullable()->after('emergency_contact_name');
            $table->string('emergency_contact_relationship')->nullable()->after('emergency_contact_phone');
            
            // Identification Details
            $table->string('government_id_type')->nullable()->after('emergency_contact_relationship');
            $table->string('government_id_number')->nullable()->after('government_id_type');
            $table->date('government_id_expiry')->nullable()->after('government_id_number');
            $table->string('government_id_upload')->nullable()->after('government_id_expiry');
            $table->string('national_insurance_number')->nullable()->after('government_id_upload');
            $table->string('right_to_work_upload')->nullable()->after('national_insurance_number');
            
            // Professional Information (Nurse-specific)
            $table->string('professional_title')->nullable()->after('right_to_work_upload');
            $table->string('licensing_authority')->nullable()->after('license_number');
            $table->date('license_issue_date')->nullable()->after('licensing_authority');
            $table->date('license_expiry_date')->nullable()->after('license_issue_date');
            $table->string('clinical_specialisation')->nullable()->after('care_specialty');
            $table->string('employment_status')->nullable()->after('years_of_experience');
            
            // Work Preferences
            $table->string('preferred_work_type')->nullable()->after('availability_type');
            $table->string('preferred_shift_pattern')->nullable()->after('preferred_work_type');
            $table->string('preferred_location')->nullable()->after('preferred_shift_pattern');
            $table->integer('max_travel_distance')->nullable()->after('preferred_location');
            $table->boolean('willing_to_relocate')->default(false)->after('max_travel_distance');
            $table->boolean('weekend_availability')->default(false)->after('willing_to_relocate');
            $table->date('available_start_date')->nullable()->after('weekend_availability');
            
            // Qualifications & Education
            $table->string('highest_qualification')->nullable()->after('available_start_date');
            $table->string('institution')->nullable()->after('highest_qualification');
            $table->string('country_of_qualification')->nullable()->after('institution');
            $table->year('graduation_year')->nullable()->after('country_of_qualification');
            $table->string('english_language_qualification')->nullable()->after('graduation_year');
            
            // Clinical Skills & Competencies (JSON)
            $table->json('clinical_skills')->nullable()->after('english_language_qualification');
            $table->json('life_support_certification')->nullable()->after('clinical_skills');
            
            // Employment History (JSON)
            $table->json('employment_history')->nullable()->after('life_support_certification');
            
            // Document Uploads (JSON)
            $table->json('document_uploads')->nullable()->after('employment_history');
            
            // Compliance
            $table->boolean('right_to_work_uk')->default(false)->after('document_uploads');
            $table->string('dbs_check_status')->nullable()->after('right_to_work_uk');
            $table->boolean('information_accurate')->default(false)->after('dbs_check_status');
            
            // HCA-Specific Fields (all in the same table)
            $table->string('hca_role_type')->nullable()->after('information_accurate'); // Healthcare Assistant, Support Worker, Caregiver, Home Care Assistant
            $table->json('hca_previous_care_settings')->nullable()->after('hca_role_type'); // Hospital, Care Home, Home Care, Private Client, Supported Living
            $table->boolean('hca_manual_handling_training')->default(false)->after('hca_previous_care_settings');
            $table->boolean('hca_first_aid_training')->default(false)->after('hca_manual_handling_training');
            $table->boolean('hca_safeguarding_training')->default(false)->after('hca_first_aid_training');
            $table->boolean('hca_medication_assistance_experience')->default(false)->after('hca_safeguarding_training');
            $table->boolean('hca_dementia_care_experience')->default(false)->after('hca_medication_assistance_experience');
            $table->boolean('hca_personal_care_experience')->default(false)->after('hca_dementia_care_experience');
            $table->boolean('hca_infection_prevention_training')->default(false)->after('hca_personal_care_experience');
            $table->json('hca_additional_skills')->nullable()->after('hca_infection_prevention_training');
            $table->string('hca_preferred_shift_type')->nullable()->after('hca_additional_skills'); // Day, Night, Flexible
            
            // Account Security (handled by Laravel authentication)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn([
                // Personal Information
                'date_of_birth',
                'nationality',
                'alternative_phone',
                'address',
                'city',
                'postcode',
                'country_of_residence',
                'emergency_contact_name',
                'emergency_contact_phone',
                'emergency_contact_relationship',
                
                // Identification Details
                'government_id_type',
                'government_id_number',
                'government_id_expiry',
                'government_id_upload',
                'national_insurance_number',
                'right_to_work_upload',
                
                // Professional Information
                'professional_title',
                'licensing_authority',
                'license_issue_date',
                'license_expiry_date',
                'clinical_specialisation',
                'employment_status',
                
                // Work Preferences
                'preferred_work_type',
                'preferred_shift_pattern',
                'preferred_location',
                'max_travel_distance',
                'willing_to_relocate',
                'weekend_availability',
                'available_start_date',
                
                // Qualifications & Education
                'highest_qualification',
                'institution',
                'country_of_qualification',
                'graduation_year',
                'english_language_qualification',
                
                // Clinical Skills
                'clinical_skills',
                'life_support_certification',
                
                // Employment History
                'employment_history',
                
                // Document Uploads
                'document_uploads',
                
                // Compliance
                'right_to_work_uk',
                'dbs_check_status',
                'information_accurate',
                
                // HCA-Specific Fields
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
                'hca_preferred_shift_type'
            ]);
        });
    }
};