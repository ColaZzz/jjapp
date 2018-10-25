<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EstateArticle::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'title' => $faker->randomElement($array = array('3房2室2卫','2房2室2卫','1房1室1卫','4房2室2卫','5房2室2卫')),
        'subtitle' => $faker->address(),
        'total' => '约'.$faker->numberBetween($min = 40, $max = 200).'万',
        'house_area' => $faker->numberBetween($min = 40, $max = 180).'m²',
        'img_url' => $faker->imageUrl($width = 400, $height = 300),
        'payment_proprotion' => '30%',
        'direction' => $faker->randomElement($array = array('东南','南北','西南','西北','东北')),
        'rank' => $faker->numberBetween($min = 1, $max = 999),
        'flag' => 1,
        'content' => $faker->text($maxNbChars = 800),
        'indexpage' => $faker->randomElement($array = array(1, 0)),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
