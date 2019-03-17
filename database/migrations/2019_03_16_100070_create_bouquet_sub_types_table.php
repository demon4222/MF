<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBouquetSubTypesTable.
 */
class CreateBouquetSubTypesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bouquet_sub_types', function(Blueprint $table) {
            $table->increments('id');
            $table->char('name',50);
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('bouquet_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bouquet_sub_types');
	}
}
