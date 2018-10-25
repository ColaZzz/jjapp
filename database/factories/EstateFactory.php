<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Estate::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle(),
        'area' => $faker->city(),
        'address' => $faker->address(),
        'state' => $faker->randomElement($array = array ('在售','未开盘','售完')),
        'price' => $faker->numberBetween($min = 6000, $max = 9000),
        'start_time' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'sell_address' => $faker->address(),
        'property_year' => 70,
        'decoration' => $faker->randomElement($array = array ('毛坯','精装')),
        'development_company' => $faker->company(),
        'greening' => '30%',
        'property_costs' => '2元',
        'property_company' => $faker->company(),
        'telephone' => $faker->phoneNumber(),
        'flag' => 1,
        'icon_url' => $faker->imageUrl($width = 100, $height = 100),
        'img_url' => $faker->imageUrl($width = 400, $height = 400),
        'rank' => $faker->numberBetween($min = 1, $max = 999)
    ];
});
