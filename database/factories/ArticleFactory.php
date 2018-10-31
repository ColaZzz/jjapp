<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle(),
        'img_url' => $faker->imageUrl(),
        'subtitle' => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'state' => $faker->randomElement($array = array('正在进行', '已结束', '尚未开始')),
        'information' => $faker->imageUrl($width = 375, $height = 750),
        'rank' => $faker->numberBetween($min = 1, $max = 999),
        'flag' => 0,
        'type' => $faker->randomElement($array = array(1, 2)),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'indexpage' => 1
    ];
});
