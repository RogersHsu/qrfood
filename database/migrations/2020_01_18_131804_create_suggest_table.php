<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuggestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suggest', function(Blueprint $table)
		{
			$table->boolean('gender')->comment('性別');
			$table->boolean('exercise')->comment('運動量');
			$table->float('calorie', 10, 0)->nullable()->comment('熱量');
			$table->float('protein', 10, 0)->nullable()->comment('蛋白質');
			$table->float('fat', 10, 0)->nullable()->comment('脂肪(總)');
			$table->float('saturatedFat', 10, 0)->nullable()->comment('飽和脂肪');
			$table->float('transFat', 10, 0)->nullable()->comment('反式脂肪');
			$table->float('cholesterol', 10, 0)->nullable()->comment('膽固醇(毫克)');
			$table->float('carbohydrate', 10, 0)->nullable()->comment('碳水化合物');
			$table->float('sugar', 10, 0)->nullable()->comment('糖');
			$table->float('dietaryFiber', 10, 0)->nullable()->comment('膳食纖維');
			$table->float('sodium', 10, 0)->nullable()->comment('鈉(毫克)');
			$table->float('calcium', 10, 0)->nullable()->comment('鈣(毫克)');
			$table->float('potassium', 10, 0)->nullable()->comment('鉀(毫克)');
			$table->float('ferrum', 10, 0)->nullable()->comment('鐵(毫克)');
			$table->timestamps();
			$table->primary(['gender','exercise']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suggest');
	}

}
