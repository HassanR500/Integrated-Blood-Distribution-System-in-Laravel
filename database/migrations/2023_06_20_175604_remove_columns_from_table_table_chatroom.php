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
        Schema::table('table_chatroom', function (Blueprint $table) {
            $table->dropColumn('sender');
            $table->dropColumn('position');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_chatroom', function (Blueprint $table) {
            //
        });
    }
};
