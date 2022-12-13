<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 40),
        'total' => rand(1000000, 20000000),
        'status' => 1,
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});
