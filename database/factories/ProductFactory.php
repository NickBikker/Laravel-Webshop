<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'imagepath' => $faker->firstName(),
        'title' => $faker->firstName(),
        'description' => $faker->firstName(),
        'price' => $faker->randomDigit(),

    ];
});
