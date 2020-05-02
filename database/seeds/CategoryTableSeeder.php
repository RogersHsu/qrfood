<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();
        
        DB::table('category')->insert(array (
            0 => 
            array (
                'cId' => 1,
                'cName' => '蔬菜',
                'created_at' => '2019-07-26 15:45:16',
                'updated_at' => '2019-07-26 15:45:16',
            ),
            1 => 
            array (
                'cId' => 2,
                'cName' => '蛋豆魚肉',
                'created_at' => '2019-09-19 02:50:14',
                'updated_at' => '2019-09-19 02:50:14',
            ),
            2 => 
            array (
                'cId' => 3,
                'cName' => '五穀雜糧',
                'created_at' => '2019-09-19 02:50:14',
                'updated_at' => '2019-09-19 02:50:14',
            ),
            3 => 
            array (
                'cId' => 4,
                'cName' => '其他',
                'created_at' => '2019-09-19 02:50:25',
                'updated_at' => '2019-09-19 02:50:25',
            ),
        ));
    }
}
