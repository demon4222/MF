<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBouquetSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouquet_size', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('bouquet_id')->unsigned();
            $table->foreign('bouquet_id')->references('id')->on('bouquets');

            $table->integer('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->integer('price')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bouquet_size');
    }
}
