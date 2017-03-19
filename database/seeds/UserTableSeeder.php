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
            'avatar' => '/img/user.png',
            'password' => bcrypt('123456'),
        ]);
        DB::table('workspaces')->insert([
            'name' => 'huy23121994',
            'description' => 'Nhà hàng YoYo',
            'url' => 'nha-hang-yoyo',
            'user_id' => 1,
            'avatar' => '/img/workspace_avatar_default.jpg',
        ]);
        DB::table('restaurants')->insert([
            'name' => 'YoYo Giải Phóng',
            'description' => 'Nhà hàng YoYo',
            'location' => '69 Giải Phóng',
            'avatar' => '/img/restaurant_avatar_default.jpg',
        ]);
    }
}
