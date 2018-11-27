<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Commodity::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle(),
        'price' => $faker->numberBetween($min = 1, $max = 200),
        'img_url' => 'images/'.$faker->randomElement($array = array ('mall01.jpg','mall02.jpg','mall03.jpg',
        'mall04.jpg','mall05.jpg','mall06.jpg','mall07.jpg','mall08.jpg','mall09.jpg')),
        'rank' => $faker->numberBetween($min = 1, $max = 900)
    ];
});
