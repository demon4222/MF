<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->increments('id');

            $table->char('name',100);

            $table->boolean('exist');

            $table->integer('height_id')->unsigned();
            $table->foreign('height_id')->references('id')->on('heights');

            $table->integer('price')->unsigned();

            $table->mediumText('description');

            $table->string('main_photo',200);
            $table->string('hover_photo',200);
            $table->string('additional_photo',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flowers');
    }
}
