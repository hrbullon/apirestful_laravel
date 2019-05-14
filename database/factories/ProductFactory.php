<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use App\User;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1,10),
        'status' => $faker->randomElement([Product::AVAILABLE_PRODUCT, Product::NOT_AVAILABLE_PRODUCT]),
        'image' => $faker->randomElement(['1.png','2.png','3.png']),
        'seller_id' => User::all()->random()->id,
    ];
});
