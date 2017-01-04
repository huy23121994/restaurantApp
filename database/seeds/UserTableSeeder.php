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
        DB::table('users')->insert([
            'username' => 'huy23121994',
            'fullname' => 'Trần Bảo Huy',
            'email' => 'huytb.contact@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
