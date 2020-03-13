<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
           'category_id' => App\Category::inRandomOrder()->first()->id,
           'name' => $name = str_replace('.','',$faker->text($maxNbChars = 10)),
           'slug' => str_replace(" ", "-", $name),
       ];
});
