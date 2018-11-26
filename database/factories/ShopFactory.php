<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Shop::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle(),
        'subtitle' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'img_url' => 'images/'.$faker->randomElement($array = array ('mall01.jpg','mall02.jpg','mall03.jpg',
        'mall04.jpg','mall05.jpg','mall06.jpg','mall07.jpg','mall08.jpg','mall09.jpg')),
        'introduction' => '<p></p><p></p><p></p><p></p><h1><img src="https://s1.ax1x.com/2018/11/24/FFfHvn.png" style="max-width:100%;"><br>
        </h1><p>&nbsp;&nbsp;&nbsp;&nbsp;自1996年成立以来，味千中国凭借其一流的拉面产品，以及系统化和标准化的经营优势...<br></p><p><img src="https://s1.ax1x.com/2018/11/24/FFfquq.png" style="max-width:100%;"><br></p><p>&nbsp; &nbsp; blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla</p><p><br></p>',
        'customize_type' => $faker->randomElement($array = array('粤式糕点', '儿童乐园', '休闲服装', '日式料理', '珠宝店')),
        'average_spent' => $faker->numberBetween($min = 1, $max = 200),
        'indexpage' => $faker->randomElement($array = array (1, 0, 0, 0, 0)),
        'rank' => $faker->numberBetween($min = 1, $max = 900),
        'type_top' => $faker->randomElement($array = array (1, 0, 0, 0, 0, 0, 0, 0))
    ];
});
