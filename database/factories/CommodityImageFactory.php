<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CommodityImage::class, function (Faker $faker) {
    return [
        'img_url' => 'images/'.$faker->randomElement($array = array('house01.jpg','house02.jpg','house03.jpg',
                    'house04.jpg','house05.jpg','house06.jpg','house07.jpg','house08.jpg','house09.jpg','house10.jpg',
                    'mall01.jpg','mall02.jpg','mall03.jpg','mall04.jpg','mall05.jpg','mall06.jpg','mall07.jpg','mall08.jpg','mall09.jpg')),
        'rank' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
