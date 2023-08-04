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
        Schema::create('doctors_info', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('gender');
            $table->integer('age');
            $table->string('ward_name');
            $table->integer('bed_no');
            $table->string('blood_group');
            $table->integer('blood_unit');
            $table->string('diagnosis');
            $table->string('doctor_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_info');
    }
};
