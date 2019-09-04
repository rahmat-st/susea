<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('no_order', 20)->primary();
            $table->unsignedBigInteger('product_id');
            $table->string('supplier', 20);
            $table->string('buyer', 20);
            $table->unsignedBigInteger('total');
            $table->unsignedBigInteger('total_price');
            $table->string('order_status', 20);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('supplier')->references('username')->on('users');
            $table->foreign('buyer')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
