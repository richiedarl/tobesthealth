<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {

            // applicant basic info
            $table->string('name')->after('candidate_id');
            $table->string('email')->after('name');
            $table->string('phone')->after('email');

            // documents & links
            $table->string('resume')->after('phone');
            $table->string('linkedin_profile')->nullable()->after('resume');
            $table->string('portfolio_url')->nullable()->after('linkedin_profile');

            // extra info
            $table->longText('additional_info')->nullable()->after('portfolio_url');
            $table->string('experience_level')->after('additional_info');

            // offer relation (model expects this)
            $table->foreignId('offer_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {

            $table->dropForeign(['offer_id']);
            $table->dropColumn([
                'offer_id',
                'name',
                'email',
                'phone',
                'resume',
                'linkedin_profile',
                'portfolio_url',
                'additional_info',
                'experience_level',
            ]);
        });
    }
};
