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
        Schema::table('hazard_identifications', function (Blueprint $table) {
            $table->string('status')->nullable()->default('validated')->after('risk');
            $table->string('note')->nullable()->after('status');
            $table->string('evidence')->nullable()->after('note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hazard_identifications', function (Blueprint $table) {
            $table->dropColumn(['status', 'note', 'evidence']);
        });
    }
};
