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
        
       $this->call(UserTableSeeder::class);
       $this->call(CategoryTableSeeder::class);
       $this->call(SuggestTableSeeder::class);
       $this->call(RestaurantTableSeeder::class);
       $this->call(FoodTableSeeder::class);
       $this->call(PostTableSeeder::class);
       $this->call(PictureTableSeeder::class);
    }
   
}
