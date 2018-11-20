<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EstateImage::class, function (Faker $faker) {
    return [
        'img_url' => $faker->randomElement($array = array ('house01.jpg','house02.jpg','house03.jpg',
        'house04.jpg','house05.jpg','house06.jpg','house07.jpg','house08.jpg','house09.jpg','house10.jpg',
        'estate01.jpg','estate02.jpg','estate03.jpg','estate04.jpg','estate05.jpg')),
        'rank' => $faker->numberBetween($min = 1, $max = 999)
    ];
});
