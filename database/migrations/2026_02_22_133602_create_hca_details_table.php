<?php
// database/migrations/2024_01_01_000001_create_hca_details_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hca_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained()->onDelete('cascade');
            
            // Personal Information (duplicated from staff for quick access)
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            
            // Professional Information
            $table->string('role_type')->nullable(); // Healthcare Assistant, Support Worker, Caregiver, Home Care Assistant
            $table->integer('years_of_experience')->default(0);
            $table->json('previous_care_settings')->nullable(); // hospital, care_home, home_care, private_client, supported_living
            $table->string('employment_status')->nullable(); // employed, self_employed, agency_staff, unemployed
            
            // Skills & Training
            $table->boolean('manual_handling_training')->default(false);
            $table->boolean('first_aid_training')->default(false);
            $table->boolean('safeguarding_training')->default(false);
            $table->boolean('medication_assistance_experience')->default(false);
            $table->boolean('dementia_care_experience')->default(false);
            $table->boolean('personal_care_experience')->default(false);
            $table->boolean('infection_prevention_training')->default(false);
            $table->text('additional_hca_skills')->nullable();
            
            // Work Preferences
            $table->string('preferred_shift_type')->nullable(); // day, night, flexible
            $table->string('preferred_location')->nullable();
            $table->integer('max_travel_distance')->nullable();
            $table->boolean('willing_to_relocate')->default(false);
            $table->boolean('weekend_availability')->default(false);
            $table->date('available_start_date')->nullable();
            
            // Employment History (JSON to store multiple entries)
            $table->json('employment_history')->nullable();
            
            $table->timestamps();
            
            // Indexes for faster queries
            $table->index('staff_id');
            $table->index('role_type');
            $table->index('preferred_location');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hca_details');
    }
};