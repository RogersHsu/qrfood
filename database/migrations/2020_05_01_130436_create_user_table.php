<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->increments('uId',true)->comment('使用者ID');
			$table->string('name', 10)->comment('姓名');
			$table->string('email', 50)->comment('信箱地址');
			$table->string('account', 20)->unique()->comment('帳號');
			$table->string('password', 60)->comment('密碼');
			$table->integer('gender')->default(0)->comment('性別');
			$table->boolean('role')->default(0)->comment('身分');
			$table->float('height', 10, 0)->comment('身高');
			$table->float('weight', 10, 0)->comment('體重');
			$table->integer('exercise')->default(0)->comment('運動量');
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
		Schema::drop('user');
	}

}
