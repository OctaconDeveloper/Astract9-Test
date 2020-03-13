<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'product_id' => App\Product::inRandomOrder()->first()->id,
        'file' => 'productImages/'.$name = $faker->randomElement($array = array ('one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen')).'.jpg',
        'slug' => $name,
    ];
});
