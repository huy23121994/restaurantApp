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