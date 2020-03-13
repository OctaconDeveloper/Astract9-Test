<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'brand_id' => App\Brand::inRandomOrder()->first()->id,
        'vendor_id' => App\Vendor::inRandomOrder()->first()->id,
        'name' => $name = str_replace('.','',$faker->text($maxNbChars = 10)),
        'slug' => str_replace(" ", "-", $name),
        'amount' => $faker->numberBetween($min = 100, $max = 9000),
        'description' => $faker->text($maxNbChars = 100),
        'availabilty' => $faker->numberBetween($min = 0, $max = 1),
        'type' => $faker->randomElement($array = array ('featured', 'sale','null')),
        'status' => '1',
    ];
});

