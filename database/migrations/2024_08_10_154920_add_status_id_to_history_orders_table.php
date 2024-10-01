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
            $table->unsignedBigInteger('StatusId')->nullable()->after('product_id');

             $table->foreign('StatusId')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('history_orders', function (Blueprint $table) {
            $table->dropColumn('StatusId');
        });
    }
};