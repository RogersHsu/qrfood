<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            //
            $table->increments('fdId')->comment('食物ID');
           // $table->integer('rsId')->comment('餐廳ID'); 外鍵
            $table->string('fdName',10)->collation('utf8_general_ci')->comment('食物名稱');
           // $table->integer('cId')->comment('食物種類ID'); 外鍵
            $table->float('gram')->nullable()->comment('克數');
            $table->float('calorie')->nullable()->comment('熱量');
            $table->float('protein')->nullable()->comment('蛋白質');
            $table->float('fat')->nullable()->comment('脂肪(總)	');
            $table->float('saturatedFat')->nullable()->comment('飽和脂肪');
            $table->float('transFat')->nullable()->comment('反式脂肪');
            $table->float('cholesterol')->nullable()->comment('膽固醇(毫克)');
            $table->float('carbohydrate')->nullable()->comment('碳水化合物(總)');
            $table->float('sugar')->nullable()->comment('糖');
            $table->float('dietaryFiber')->nullable()->comment('膳食纖維');
            $table->float('sodium')->nullable()->comment('鈉(毫克)');
            $table->float('calcium')->nullable()->comment('鈣(毫克)');
            $table->float('potassium')->nullable()->comment('鉀(毫克)');
            $table->float('ferrum')->nullable()->comment('鐵(毫克)');
            $table->string('photo',100)->nullable()->collation('utf8_general_ci')->comment('照片');
            $table->tinyInteger('disable')->default(0);
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('修改時間');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food', function (Blueprint $table) {
            Schema::dropIfExists('food');
        });
       

    }
}
