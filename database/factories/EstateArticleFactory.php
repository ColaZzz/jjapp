<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EstateArticle::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'title' => $faker->randomElement($array = array('3房2室2卫','2房2室2卫','1房1室1卫','4房2室2卫','5房2室2卫')),
        'subtitle' => $faker->address(),
        'total' => '约'.$faker->numberBetween($min = 40, $max = 200).'万',
        'house_area' => $faker->numberBetween($min = 40, $max = 180).'m²',
        'img_url' => $faker->randomElement($array = array ('house01.jpg','house02.jpg','house03.jpg',
                    'house04.jpg','house05.jpg','house06.jpg','house07.jpg','house08.jpg','house09.jpg','house10.jpg',
                    'estate01.jpg','estate02.jpg','estate03.jpg','estate04.jpg','estate05.jpg')),
        'payment_proprotion' => '30%',
        'direction' => $faker->randomElement($array = array('东南','南北','西南','西北','东北')),
        'rank' => $faker->numberBetween($min = 1, $max = 999),
        'flag' => 1,
        'content' => '<p></p><p></p><h1>最新活动</h1><h3>rich-text</h3><p>支持默认事件，包括：<code>tap</code>、<code>touchstart</code>、<code>touchmove</code>、<code>touchcancel</code>、<code>touchend</code>和<code>longtap</code></p><p><strong>nodes 属性推荐使用 Array 类型，由于组件会将 String 类型转换为 Array 类型，因而性能会有所下降</strong></p><h3>nodes</h3><p>现支持两种节点，通过type来区分，分别是元素节点和文本节点，默认是元素节点，在富文本区域里显示的HTML节点</p><p><img src="https://s1.ax1x.com/2018/11/05/iIlFFf.jpg" style="max-width:100%;"><br></p>',
        'indexpage' => $faker->randomElement($array = array(1, 0)),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
