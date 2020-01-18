<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('uId', true)->comment('使用者ID');
			$table->string('name', 10)->comment('姓名');
			$table->string('email', 50)->comment('信箱地址');
			$table->string('account', 20)->unique('account')->comment('帳號');
			$table->char('password', 60)->comment('密碼');
			$table->boolean('gender')->default(0)->comment('性別');
			$table->boolean('role')->default(0)->comment('身分');
			$table->float('height', 10, 0)->comment('身高');
			$table->float('weight', 10, 0)->comment('體重');
			$table->boolean('exercise')->default(0)->comment('運動量');
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
		Schema::drop('user');
	}

}
