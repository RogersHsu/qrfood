<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restaurant', function(Blueprint $table)
		{
			$table->integer('rsId', true)->comment('餐廳ID');
			$table->string('location', 4)->comment('餐廳位置');
			$table->string('rsName', 10)->comment('餐廳名稱');
			$table->string('photo', 100)->comment('照片');
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
		Schema::drop('restaurant');
	}

}
