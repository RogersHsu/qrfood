<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(FoodTableSeeder::class);
        
        $this->call(UsersTableSeeder::class);
        DB::table('food')->insert([
            'fdName' => str_random(10),
            'gram' => (float)rand() / (float)getrandmax(),
            'calorie' => (float)rand() / (float)getrandmax(),
            'protein' => (float)rand() / (float)getrandmax(),
            'fat' => (float)rand() / (float)getrandmax(),
            'saturatedFat' => (float)rand() / (float)getrandmax(),
            'transFat' => (float)rand() / (float)getrandmax(),
            'cholesterol' => (float)rand() / (float)getrandmax(),
            'carbohydrate' => (float)rand() / (float)getrandmax(),
            'sugar' => (float)rand() / (float)getrandmax(),
            'dietaryFiber' => (float)rand() / (float)getrandmax(),
            'sodium' => (float)rand() / (float)getrandmax(),
            'calcium' => (float)rand() / (float)getrandmax(),
            'potassium' => (float)rand() / (float)getrandmax(),
            'ferrum' => (float)rand() / (float)getrandmax(),
            'photo' => "http://localhost/qrfood/img/01.jpg",
            

        ]);
    }
   
}
