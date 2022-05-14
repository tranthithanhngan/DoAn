<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Admin;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'admin_name' => $faker->name,
        'admin_email' => $faker->unique()->safeEmail,
        'admin_phone' => '03725416398',
      
        'password' => '123456', // password
        'remember_token' => Str::random(10),
    ];
});
