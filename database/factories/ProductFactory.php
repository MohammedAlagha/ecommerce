<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->text('30'),
        'description'=>$faker->paragraph(),
        'price'=>$faker->numberBetween(10,90000),
        'manage_stock'=> false,
        'qty'=>$faker->numberBetween(5,300),
        'slug'=>$faker->slug(),
        'sku'=>$faker->word(),
        'status'=>$faker->boolean(),
    ];
});
