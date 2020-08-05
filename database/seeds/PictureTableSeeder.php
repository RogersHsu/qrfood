<?php

use Illuminate\Database\Seeder;

class PictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('picture')->delete();
        DB::table('picture')->insert(array (
            0 =>
                array (
                    'pId' => '1',
                    'url' => 'http://qrfood.tw/qrfood/img/01.jpg'
                ),
            1 =>
                array (
                    'pId' => '2',
                    'url' => 'http://qrfood.tw/qrfood/img/02.jpg'
                ),
        ));
    }
}
