<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('record', function(Blueprint $table)
		{
			$table->increments('sn')->comment('流水號');
			$table->integer('uId')->unsigned()->index('uId')->comment('使用者ID');
			$table->date('date')->comment('日期');
			$table->char('time', 1)->comment('時段');
			$table->integer('fdId')->unsigned()->index('fdId')->comment('食物ID');
			$table->integer('serving')->comment('份量');
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
		Schema::drop('record');
	}

}
