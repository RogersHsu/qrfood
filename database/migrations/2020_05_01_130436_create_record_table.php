<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->increments('sn', true)->comment('流水號');
			$table->unsignedInteger('uId')->index('uId')->comment('使用者ID');
			$table->date('date')->comment('日期');
			$table->char('time', 1)->comment('時段');
			$table->unsignedInteger('fdId')->index('fdId')->comment('食物ID');
			$table->integer('serving')->comment('份量');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
