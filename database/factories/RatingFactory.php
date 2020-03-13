<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'product_id' => App\Product::inRandomOrder()->first()->id,
        'rating' => $faker->numberBetween($min = 1, $max =5),
    ];
});
