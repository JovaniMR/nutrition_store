<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(15),
        'long_description' => $faker->text,
        'number_content' => $faker->randomDigitNot(0),
        'weight_unit_content' => $faker->randomLetter,
        'flavor' => $faker->word,
        'price' => $faker->randomFloat(2,200,3000),
        'category_id'=>$faker->numberBetween(1,2)
    ];
});
