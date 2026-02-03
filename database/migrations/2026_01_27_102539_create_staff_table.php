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
    
    Schema::create('staff', function (Blueprint $table) {
     $table->id();

    // IDENTITY
    $table->string('full_name');
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->enum('gender', ['male', 'female', 'other'])->nullable();

    // PROFESSIONAL (NURSE-FOCUSED)
    $table->string('role')->default('Nurse'); // still flexible
    $table->string('nursing_level')->nullable(); 
    // e.g. RN, LPN, ICU Nurse, Pediatric Nurse

    $table->integer('years_of_experience')->nullable();
    $table->string('care_specialty')->nullable(); 
    // e.g. Emergency Care, Elderly Care, Home Care

    // CREDENTIALS
    $table->string('license_number')->nullable();
    $table->boolean('license_verified')->default(false);

    // SKILLS / COMPETENCIES
    $table->json('skills')->nullable(); 
    // ["IV Therapy", "Wound Care", "Patient Monitoring"]

    // MEDIA
    $table->string('photo')->nullable();

    // AVAILABILITY / HIRING
    $table->boolean('is_available')->default(true);
    $table->enum('availability_type', ['full_time', 'part_time', 'shift', 'contract'])->nullable();

    // PLATFORM CONTROL
    $table->boolean('is_active')->default(true);
    $table->boolean('is_featured')->default(false); // for homepage cards

    // OPTIONAL PROFILE INFO
    $table->text('bio')->nullable();
    $table->softDeletes();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
