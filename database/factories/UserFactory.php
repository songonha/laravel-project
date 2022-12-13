<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $gender = rand(0, 1);
    return [
        'name' => $faker->name,
        'dateOfBirth' => $faker->date,
        'gender' => $gender,
        'address' => $faker->address,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('password'), // password
        'role' => rand(0, 1),
        'image' => $gender === 1 ? User::IMAGE_MALE : User::IMAGE_FEMALE,
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});
