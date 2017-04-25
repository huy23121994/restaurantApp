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
        DB::table('users')->insert([
            'username' => 'user',
            'fullname' => 'Test User',
            'email' => 'test.user@example.com',
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
        
        for($i=1; $i<3; $i++){
            DB::table('workspace_admins')->insert([
                'username' => 'admin',
                'password' => encrypt('admin'),
                'workspace_id' => $i,
            ]);
        }
        $roles = ['Restaurant Admin', 'Global Amin', 'Super Admin'];
        for ($i=0; $i < count($roles); $i++) { 
             DB::table('restaurant_roles')->insert([
                'name' => $roles[$i],
            ]);
        }
        
        factory(App\Models\Restaurant::class, 4)->create();
        factory(App\Models\Employee::class, 6)->create();
    }
}
