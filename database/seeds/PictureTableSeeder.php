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
        DB::table('picture')->insert(array (
            0 =>
                array (
                    'pId' => 1,
                    'url' => 'http://localhost/qrfood/public/storage/picture/12.png',
                ),
            1 =>
                array (
                    'pId' => 2,
                    'url' => 'http://localhost/qrfood/public/storage/picture/13.png',
                ),
        ));
    }
}
