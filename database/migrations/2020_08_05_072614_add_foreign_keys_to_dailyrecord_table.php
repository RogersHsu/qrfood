<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDailyrecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dailyrecord', function(Blueprint $table)
		{
			$table->foreign('uId', 'dailyrecord_ibfk_1')->references('uId')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dailyrecord', function(Blueprint $table)
		{
			$table->dropForeign('dailyrecord_ibfk_1');
		});
	}

}
