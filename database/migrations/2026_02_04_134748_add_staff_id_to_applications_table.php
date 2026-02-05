<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->foreignId('staff_id')
                ->nullable()
                ->after('candidate_id')
                ->constrained('staff')
                ->nullOnDelete();

            $table->unique(['offer_id', 'candidate_id']);
            $table->unique(['offer_id', 'staff_id']);
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropUnique(['offer_id', 'candidate_id']);
            $table->dropUnique(['offer_id', 'staff_id']);
            $table->dropConstrainedForeignId('staff_id');
        });
    }
};
