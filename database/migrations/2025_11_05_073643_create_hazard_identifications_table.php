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
        Schema::create('hazard_identifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_list_id')->constrained('activity_lists')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('hazard');
            $table->string('risk');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hazard_identifications');
    }
};
