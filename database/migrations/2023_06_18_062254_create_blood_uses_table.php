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
        Schema::create('blood_uses', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('blood_group');
            $table->integer('amount_used');
            $table->string('place');
            $table->string('date');
            $table->timestamps();
        });
        Schema::table('blood_uses', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id")->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_uses');
    }
};
