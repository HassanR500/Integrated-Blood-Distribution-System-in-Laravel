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
        Schema::create('blood_donation', function (Blueprint $table) {
            $table->id();
            
            $table->string("donor_name");
            $table->string("donor_address");
            $table->string("donor_age");
            $table->string("blood_group");
            
            $table->integer("amount_donated")->default(0);
            $table->string("date");
            
            $table->timestamps();

            
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_donation');
    }
};
