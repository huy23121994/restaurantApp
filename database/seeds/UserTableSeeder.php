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
            'name' => 'Nhà hàng YoYo',
            'description' => 'Nhà hàng YoYo',
            'url' => 'nha-hang-yoyo',
            'user_id' => 1,
            'avatar' => '/img/workspace_avatar_default.jpg',
        ]);
        DB::table('workspaces')->insert([
            'name' => 'KFC Hà Nội',
            'description' => 'KFC Hà Nội',
            'url' => 'kfc-ha-noi',
            'user_id' => 1,
            'avatar' => '/img/workspace_avatar_default.jpg',
        ]);
        DB::table('workspace_admins')->insert([
            'username' => 'admin',
            'password' => encrypt('admin'),
            'workspace_id' => 1,
        ]);
        DB::table('workspace_admins')->insert([
            'username' => 'admin',
            'password' => encrypt('admin'),
            'workspace_id' => 2,
        ]);
        DB::table('restaurants')->insert([
            'name' => 'YoYo Giải Phóng',
            'description' => 'Nhà hàng YoYo',
            'location' => '69 Giải Phóng',
            'avatar' => '/img/restaurant_avatar_default.jpg',
            'workspace_id' => '1',
        ]);
        DB::table('restaurants')->insert([
            'name' => 'YoYo Long Biên',
            'description' => 'Nhà hàng YoYo',
            'location' => '96 Long Biên',
            'avatar' => '/img/restaurant_avatar_default.jpg',
            'workspace_id' => '1',
        ]);
        factory(App\Models\Employee::class, 40)->create();
    }
}
