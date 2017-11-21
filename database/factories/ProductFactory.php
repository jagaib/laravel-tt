<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	return [
		'name' => $faker->sentence,
      'price' => $faker->numberBetween(100,1000),
      'category_id' => App\Category::inRandomOrder()->first()->id,
	];
});
