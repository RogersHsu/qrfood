<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('record', function(Blueprint $table)
		{
			$table->foreign('uId', 'record_ibfk_1')->references('uId')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('fdId', 'record_ibfk_2')->references('fdId')->on('food')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('record', function(Blueprint $table)
		{
			$table->dropForeign('record_ibfk_1');
			$table->dropForeign('record_ibfk_2');
		});
	}

}
