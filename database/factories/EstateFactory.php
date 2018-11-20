<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Estate::class, function (Faker $faker) {
    return [
        'title' => '坚基·'.$faker->jobTitle(),
        'area' => $faker->city(),
        'address' => $faker->address(),
        'state' => $faker->randomElement($array = array ('在售','未开盘','售完')),
        'price' => $faker->numberBetween($min = 6000, $max = 9000),
        'start_time' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'sell_address' => $faker->address(),
        'decoration' => $faker->randomElement($array = array ('毛坯','精装')),
        'telephone' => $faker->phoneNumber(),
        'flag' => 1,
        'icon_url' => 'logo.jpg',
        'img_url' => $faker->randomElement($array = array ('estate01.jpg','estate02.jpg','estate03.jpg',
        'estate04.jpg','estate05.jpg')),
        'rank' => $faker->numberBetween($min = 1, $max = 999),
        'place_area' => $faker->numberBetween($min = 10000, $max = 20000).'m²',
        'house_area' => $faker->numberBetween($min = 9000, $max = 10000).'m²',
    ];
});
