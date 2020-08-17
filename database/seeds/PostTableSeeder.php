<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('post')->delete();
        DB::table('post')->insert(array (
            0 =>
                array (
                    'subject' => '早餐',
                    'context' => '很難吃',
                    'uId' => '3',
                    'time' => '2020-08-05 14:27:35',
                    'rId' => null,
                    'is_public' => 1,
                    'r_context' => null,
                    'location' => '靜園自助餐',

                ),
            1 =>
                array (
                    'subject' => '午餐',
                    'context' => '非常難吃',
                    'uId' => '3',
                    'time' => '2020-08-05 15:00:35',
                    'rId' => null,
                    'is_public' => 1,
                    'r_context' => null,
                    'location' => '靜園自助餐',
                ),
        ));
    }
}
