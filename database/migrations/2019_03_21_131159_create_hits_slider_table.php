<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitsSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hits_slider', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bouquet_id')->unsigned();
            $table->foreign('bouquet_id')->references('id')->on('bouquets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hits_slider');
    }
}
