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
        Schema::create('determining_controls', function (Blueprint $table) {
            $table->id();
            $table->foreignId(('risk_assessment_id'))->constrained('risk_assessments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('risk_control');
            $table->foreignId('control_hierarchical_id')->constrained('control_hierarchicals')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('cost');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('determining_controls');
    }
};
