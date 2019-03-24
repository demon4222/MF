<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumnSlugBouquets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bouquets', function (Blueprint $table) {
            $table->string('slug')->nullable()->index();
        });
        Schema::table('bouquet_sub_types', function (Blueprint $table) {
            $table->string('slug')->nullable()->index();
        });
        Schema::table('bouquet_types', function (Blueprint $table) {
            $table->string('slug')->nullable()->index();
        });
        Schema::table('flowers', function (Blueprint $table) {
            $table->string('slug')->nullable()->index();
        });
        Schema::table('flower_categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bouquets', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('bouquet_sub_types', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('bouquet_types', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('flowers', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('flower_categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
