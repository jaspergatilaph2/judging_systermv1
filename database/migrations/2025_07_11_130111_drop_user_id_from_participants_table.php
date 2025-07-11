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
        Schema::table('participants', function (Blueprint $table) {
            Schema::table('participants', function (Blueprint $table) {
                // First drop the foreign key constraint if it exists
                if (Schema::hasColumn('participants', 'user_id')) {
                    $table->dropForeign(['user_id']); // Drop FK first
                    $table->dropColumn('user_id');    // Then drop the column
                }
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('participants', function (Blueprint $table) {
            Schema::table('participants', function (Blueprint $table) {
                // Re-add the user_id column if needed
                $table->unsignedBigInteger('user_id')->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        });
    }
};
