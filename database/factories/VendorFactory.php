<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first()->id,
        'name' => $name = str_replace('.','',$faker->text($maxNbChars = 20)),
        'slug' => str_replace(" ", "-", $name),
        'description' => $faker->text($maxNbChars = 200),
        'phone' => $faker->phoneNumber,
        'status' => $faker->numberBetween($min = 0, $max = 1),
    ];
});
