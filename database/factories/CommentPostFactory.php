<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CommentPost;
use Faker\Generator as Faker;

$factory->define(CommentPost::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'post_id' => rand(1, 2),
        'content' => $faker->text(50),
    ];
});
