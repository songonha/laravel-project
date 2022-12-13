<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CommentProduct;
use Faker\Generator as Faker;

$factory->define(CommentProduct::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'product_id' => rand(1, 11),
        'content' => $faker->text(50),
    ];
});
