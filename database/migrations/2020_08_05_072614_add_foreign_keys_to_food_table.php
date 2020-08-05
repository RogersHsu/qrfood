<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('food', function(Blueprint $table)
		{
			$table->foreign('rsId', 'food_ibfk_1')->references('rsId')->on('restaurant')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('cId', 'food_ibfk_2')->references('cId')->on('category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('food', function(Blueprint $table)
		{
			$table->dropForeign('food_ibfk_1');
			$table->dropForeign('food_ibfk_2');
		});
	}

}
