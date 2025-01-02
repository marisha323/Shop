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
        Schema::table('history_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id')->nullable()->after('order_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('history_orders', function (Blueprint $table) {
            $table->dropColumn('color_id');
            $table->dropForeign(['color_id']);
        });
    }
};
