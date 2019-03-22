<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBouquetsTable.
 */
class CreateBouquetsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bouquets', function(Blueprint $table) {
			$table->increments('id');

            $table->char('name',100);

            // $table->integer('flower_id')->unsigned();
            // $table->foreign('flower_id')->references('id')->on('flowers');

            $table->integer('sub_type_id')->unsigned();
            $table->foreign('sub_type_id')->references('id')->on('bouquet_sub_types');

			$table->boolean('bouquet_of_the_day')->default(0);
            // $table->integer('size_id')->unsigned();
            // $table->foreign('size_id')->references('id')->on('sizes');

            // $table->integer('price');

            $table->mediumText('description');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bouquets');
	}
}
