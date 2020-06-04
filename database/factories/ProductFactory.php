<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = substr($faker->text($faker->numberBetween(5, 30)), 0, -1);
    $image = sprintf('images/%d.jpg', $faker->numberBetween(1, 10));

    return [
        'title' => $title,
        'description' => $faker->text($faker->numberBetween(20, 150)),
        'image' => $image,
        'price' => $faker->numberBetween(100, 10000),
        'in_stock' => $faker->randomElement([0, 1]),
    ];
});
