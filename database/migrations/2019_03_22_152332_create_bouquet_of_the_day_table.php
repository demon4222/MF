<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBouquetOfTheDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouquet_of_the_day', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('bouquet_id')->unsigned();
            $table->foreign('bouquet_id')->references('id')->on('bouquets');

            $table->integer('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bouquet_of_the_day');
    }
}
