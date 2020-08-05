<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePictureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('picture', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('圖片ID');
			$table->integer('pId')->index('pId')->comment('文章ID');
			$table->text('url', 65535)->comment('圖片網址');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('picture');
	}

}
