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
            $table->increments('id');
            $table->boolean('isComplete')->default(0);

            $table->string('category');
            $table->string('product_slug');
            $table->integer('product_size_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('qty')->default(1);
            $table->integer('total');

            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_shipping_name')->nullable();
            $table->string('customer_shipping_phone')->nullable();

            $table->string('delivery_type');
            $table->string('delivery_date');
            $table->string('delivery_time');
            $table->string('delivery_address')->nullable();
            $table->string('payment_method');
            $table->string('add_info')->nullable();
            
            $table->timestamps();
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
