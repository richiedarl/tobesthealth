<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('offer_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('staff_id')
                ->nullable()
                ->after('candidate_id')
                ->constrained('staff')
                ->nullOnDelete();

            $table->unique(['offer_id', 'staff_id']);    

            // applicant basic info
            $table->string('name');
            $table->string('email');
            $table->string('phone');

            // documents and links
            $table->string('resume');
            $table->string('linkedin_profile')->nullable();
            $table->string('portfolio_url')->nullable();

            // additional details
            $table->longText('additional_info')->nullable();
            $table->string('experience_level');

            // application content
            $table->longText('cover_letter')->nullable();

        $table->enum('status', [
            'submitted',
            'pending',
            'reviewed',
            'shortlisted',
            'rejected'
        ])->default('submitted');

            $table->string('opened_at')->nullable();

            $table->timestamps();

            // prevent duplicate application to same job
            $table->unique(['offer_id', 'candidate_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
            $table->dropUnique(['offer_id', 'staff_id']);
            $table->dropConstrainedForeignId('staff_id');
            $table->dropUnique(['offer_id', 'candidate_id']);
    }
};
