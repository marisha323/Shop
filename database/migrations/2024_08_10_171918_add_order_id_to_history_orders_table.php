<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('history_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable()->after('product_id');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('history_orders', function (Blueprint $table) {
            $table->dropColumn('order_id');

             $table->dropForeign(['order_id']);
        });
    }

};
