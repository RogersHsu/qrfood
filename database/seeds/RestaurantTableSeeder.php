<?php

use Illuminate\Database\Seeder;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant')->delete();
        
        DB::table('restaurant')->insert(array (
            0 => 
            array (
                'location' => '靜園',
                'rsName' => '松林自助餐',
                'photo' => '',
                'created_at' => '2019-07-26 15:56:53',
                'updated_at' => '2019-07-26 15:56:53',
            ),
            1 => 
            array (
                'location' => '宜園',
                'rsName' => '聖明自助餐',
                'photo' => '',
                'created_at' => '2019-12-01 14:27:35',
                'updated_at' => '2019-12-01 14:27:35',
            ),
            2 => 
            array (
                'location' => '靜園',
                'rsName' => '左撇子',
                'photo' => '',
                'created_at' => '2019-12-16 10:42:06',
                'updated_at' => '2019-12-16 10:42:06',
            ),
        ));
    }
}
