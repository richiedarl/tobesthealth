<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('job_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->longText('cover_letter')->nullable();
            $table->enum('status', [
                'pending',
                'reviewed',
                'shortlisted',
                'rejected'
            ])->default('pending');
            $table->string('opened_at')->default(false);
            $table->timestamps();

            // prevent duplicate application to same job
            $table->unique(['job_id', 'candidate_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
