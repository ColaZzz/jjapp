<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle(),
        'img_url' => 'images/'.$faker->randomElement($array = array ('mall01.jpg','mall02.jpg','mall03.jpg',
                    'mall04.jpg','mall05.jpg','mall06.jpg','mall07.jpg','mall08.jpg','mall09.jpg')),
        'subtitle' => $faker->realText($maxNbChars = 60, $indexSize = 2),
        'state' => $faker->randomElement($array = array('正在进行', '已结束', '尚未开始')),
        'information' => '<p></p><p></p><h1>最新活动</h1><h3>rich-text</h3><p>支持默认事件，包括：<code>tap</code>、<code>touchstart</code>、<code>touchmove</code>、<code>touchcancel</code>、<code>touchend</code>和<code>longtap</code></p><p><strong>nodes 属性推荐使用 Array 类型，由于组件会将 String 类型转换为 Array 类型，因而性能会有所下降</strong></p><h3>nodes</h3><p>现支持两种节点，通过type来区分，分别是元素节点和文本节点，默认是元素节点，在富文本区域里显示的HTML节点</p><p><img src="https://s1.ax1x.com/2018/11/05/iIlFFf.jpg" style="max-width:100%;"><br></p>',
        'rank' => $faker->numberBetween($min = 1, $max = 999),
        'flag' => 0,
        'type' => $faker->randomElement($array = array(1, 2)),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'indexpage' => 1
    ];
});
