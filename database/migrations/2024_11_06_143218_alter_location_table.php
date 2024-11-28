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
        Schema::table('location', function (Blueprint $table) {
        $table->string('versity_name')->after('id'); // Add the sender_name column after sender_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location', function (Blueprint $table) {
            $table->dropColumn('versity_name')->after('id'); // Add the sender_name column after sender_id
            });
    }
};
