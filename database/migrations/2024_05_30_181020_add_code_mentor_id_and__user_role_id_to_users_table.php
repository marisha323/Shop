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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('code_mentor_id')->nullable()->constrained('code_mentors')->onDelete('cascade');
            $table->foreignId('user_role_id')->nullable()->constrained('users_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['code_mentor_id']);
            $table->dropColumn('code_mentor_id');
            $table->dropForeign(['user_role_id']);
            $table->dropColumn('user_role_id');
        });
    }
};
