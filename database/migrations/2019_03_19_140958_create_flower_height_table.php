<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowerHeightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flower_height', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('flower_id')->unsigned();
            $table->foreign('flower_id')->references('id')->on('flowers');
            
            $table->integer('height_id')->unsigned();
            $table->foreign('height_id')->references('id')->on('heights');

            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flower_height');
    }
}
