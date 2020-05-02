<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();
        
        DB::table('user')->insert(array (
            0 => 
            array (
                'name' => '管理者',
                'email' => 'qrfood@gmail.com',
                'account' => 'qrfood',
                'password' => Hash::make('123123'),
                'gender' => 1,
                'role' => 1,
                'height' => 1.0,
                'weight' => 1.0,
                'exercise' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
