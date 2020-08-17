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
                    'uId' => '2',
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
                    'uId' => '2',
                    'time' => '2020-08-05 15:00:35',
                    'rId' => null,
                    'is_public' => 1,
                    'r_context' => null,
                    'location' => '靜園自助餐',
                ),
            2 =>
                array (
                    'subject' => null,
                    'context' => null,
                    'uId' => '2',
                    'time' => '2020-08-05 15:00:35',
                    'rId' => 1,
                    'is_public' => 1,
                    'r_context' => "明明就很好吃",
                    'location' => null,
                ),
            3 =>
                array (
                    'subject' => null,
                    'context' => null,
                    'uId' => '2',
                    'time' => '2020-08-05 15:00:35',
                    'rId' => 2,
                    'is_public' => 1,
                    'r_context' => "還好吧",
                    'location' => null,

                ),
        ));
    }
}
