<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    

    return [
        // 'name' => $faker->name,
        // 'description' => $faker->text,
        // 'votes' => 1,
        'category_id'=>2,
        'product_name' => $faker->name,
        'short_description' => $faker->text,
        'long_description' => $faker->text,
        'product_image' => 'product_image/12result.jpg',
        'qty' => $faker->numberBetween($min = 1, $max = 2147483647),
        'price' => 100,
        'publication_status'=>1,

    ];
});
