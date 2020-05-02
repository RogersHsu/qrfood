<?php

use Illuminate\Database\Seeder;

class SuggestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suggest')->delete();
        
        DB::table('suggest')->insert(array (
            0 => 
            array (
                'gender' => 1,
                'exercise' => 1,
                'calorie' => 1850.0,
                'protein' => 60.0,
                'fat' => 61.6,
                'saturatedFat' => 23.0,
                'transFat' => 0.0,
                'cholesterol' => 300.0,
                'carbohydrate' => 277.5,
                'sugar' => 46.2,
                'dietaryFiber' => 35.0,
                'sodium' => 2400.0,
                'calcium' => 1000.0,
                'potassium' => 4700.0,
                'ferrum' => 10.0,
                'created_at' => '2019-10-17 17:46:17',
                'updated_at' => '2019-10-17 17:46:17',
            ),
            1 => 
            array (
                'gender' => 1,
                'exercise' => 2,
                'calorie' => 2150.0,
                'protein' => 60.0,
                'fat' => 71.6,
                'saturatedFat' => 23.0,
                'transFat' => 0.0,
                'cholesterol' => 300.0,
                'carbohydrate' => 322.5,
                'sugar' => 53.7,
                'dietaryFiber' => 35.0,
                'sodium' => 2400.0,
                'calcium' => 1000.0,
                'potassium' => 4700.0,
                'ferrum' => 10.0,
                'created_at' => '2019-10-17 17:46:17',
                'updated_at' => '2019-10-17 17:46:17',
            ),
            2 => 
            array (
                'gender' => 1,
                'exercise' => 3,
                'calorie' => 2400.0,
                'protein' => 60.0,
                'fat' => 80.0,
                'saturatedFat' => 23.0,
                'transFat' => 0.0,
                'cholesterol' => 300.0,
                'carbohydrate' => 360.0,
                'sugar' => 60.0,
                'dietaryFiber' => 35.0,
                'sodium' => 2400.0,
                'calcium' => 1000.0,
                'potassium' => 4700.0,
                'ferrum' => 10.0,
                'created_at' => '2019-10-17 17:48:14',
                'updated_at' => '2019-10-17 17:48:14',
            ),
            3 => 
            array (
                'gender' => 1,
                'exercise' => 4,
                'calorie' => 2700.0,
                'protein' => 60.0,
                'fat' => 90.0,
                'saturatedFat' => 23.0,
                'transFat' => 0.0,
                'cholesterol' => 300.0,
                'carbohydrate' => 405.0,
                'sugar' => 67.5,
                'dietaryFiber' => 35.0,
                'sodium' => 2400.0,
                'calcium' => 1000.0,
                'potassium' => 4700.0,
                'ferrum' => 10.0,
                'created_at' => '2019-10-17 17:48:14',
                'updated_at' => '2019-10-17 17:48:14',
            ),
            4 => 
            array (
                'gender' => 2,
                'exercise' => 1,
                'calorie' => 1450.0,
                'protein' => 50.0,
                'fat' => 48.3,
                'saturatedFat' => 18.0,
                'transFat' => 0.0,
                'cholesterol' => 300.0,
                'carbohydrate' => 217.5,
                'sugar' => 36.2,
                'dietaryFiber' => 28.0,
                'sodium' => 2400.0,
                'calcium' => 1000.0,
                'potassium' => 4700.0,
                'ferrum' => 15.0,
                'created_at' => '2019-10-17 17:50:01',
                'updated_at' => '2019-10-17 17:50:01',
            ),
            5 => 
            array (
                'gender' => 2,
                'exercise' => 2,
                'calorie' => 1650.0,
                'protein' => 50.0,
                'fat' => 55.0,
                'saturatedFat' => 18.0,
                'transFat' => 0.0,
                'cholesterol' => 300.0,
                'carbohydrate' => 247.5,
                'sugar' => 41.25,
                'dietaryFiber' => 28.0,
                'sodium' => 2400.0,
                'calcium' => 1000.0,
                'potassium' => 4700.0,
                'ferrum' => 15.0,
                'created_at' => '2019-10-17 17:50:01',
                'updated_at' => '2019-10-17 17:50:01',
            ),
            6 => 
            array (
                'gender' => 2,
                'exercise' => 3,
                'calorie' => 1900.0,
                'protein' => 50.0,
                'fat' => 63.3,
                'saturatedFat' => 18.0,
                'transFat' => 0.0,
                'cholesterol' => 300.0,
                'carbohydrate' => 285.0,
                'sugar' => 47.5,
                'dietaryFiber' => 28.0,
                'sodium' => 2400.0,
                'calcium' => 1000.0,
                'potassium' => 4700.0,
                'ferrum' => 15.0,
                'created_at' => '2019-10-17 17:51:40',
                'updated_at' => '2019-10-17 17:51:40',
            ),
            7 => 
            array (
                'gender' => 2,
                'exercise' => 4,
                'calorie' => 2100.0,
                'protein' => 50.0,
                'fat' => 70.0,
                'saturatedFat' => 18.0,
                'transFat' => 0.0,
                'cholesterol' => 300.0,
                'carbohydrate' => 315.0,
                'sugar' => 52.5,
                'dietaryFiber' => 28.0,
                'sodium' => 2400.0,
                'calcium' => 1000.0,
                'potassium' => 4700.0,
                'ferrum' => 15.0,
                'created_at' => '2019-10-17 17:51:40',
                'updated_at' => '2019-10-17 17:51:40',
            ),
        ));
    }
}
