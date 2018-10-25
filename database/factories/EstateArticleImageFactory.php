<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EstateArticleImage::class, function (Faker $faker) {
    return [
        'img_url' => $faker->imageUrl($width = 400, $height = 300),
        'rank' => $faker->numberBetween($min = 1, $max = 999)
    ];
});
