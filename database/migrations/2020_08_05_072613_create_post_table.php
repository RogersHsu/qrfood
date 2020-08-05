<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table)
		{
			$table->integer('pId', true)->comment('文章ID');
			$table->text('subject', 65535)->nullable()->comment('標題');
			$table->text('context', 65535)->nullable()->comment('內容');
			$table->integer('uId')->unsigned()->index('uId')->comment('PO文者ID');
			$table->timestamp('time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('貼文順序');
			$table->integer('rId')->nullable()->index('rId')->comment('回覆者');
			$table->boolean('is_public')->nullable()->default(1)->comment('隱私');
			$table->text('r_context', 65535)->nullable()->comment('回覆內容');
			$table->text('location', 65535)->nullable()->comment('地點');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post');
	}

}
