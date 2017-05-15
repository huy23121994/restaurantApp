<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\Employee::class, function (Faker\Generator $faker) {
    return [
        'workspace_id' => rand(1,2),
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'people_id' => mt_rand(100000000,1000000000),
        'birthday' => $faker->date('d/m/Y', 'now'),
        'avatar' => '/img/user.png',
        'gender' => rand(0,1),
        'address' => $faker->address,
    ];
});

$factory->define(App\Models\Restaurant::class, function (Faker\Generator $faker) {
    $streetName = $faker->streetName;
    return [
        'name' => 'Nhà hàng ' . $streetName,
        'description' => 'Nhà hàng ' . $streetName,
        'location' => [
            'title' => $streetName,
            'lat' => 20.992236435785138,
            'lng' => 105.84230020635982,
        ],
        'avatar' => '/img/restaurant_avatar_default.jpg',
        'workspace_id' => rand(1,2),
    ];
});