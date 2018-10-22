<?php

use Illuminate\Database\Seeder;

class EstateArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'estate_id' => '1',
                'title' => '3室2厅2卫',
                'subtitle' => '3室2厅2卫副标题',
                'total' => '约90万',
                'house_area' => '106m²',
                'payment_proprotion' => '30%',
                'img_url' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1539597503133&di=91def7b745718aeefdb274ed28da4cf4&imgtype=0&src=http%3A%2F%2Fpic2.ooopic.com%2F13%2F07%2F27%2F58b2OOOPIC92_1024.jpg',
                'direction' => '南北',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。',
                'flag' => 1,
                'indexpage' => 1
            ],
            [
                'estate_id' => '1',
                'title' => '2室2厅2卫',
                'subtitle' => '2室2厅2卫副标题',
                'total' => '约73万',
                'house_area' => '91m²',
                'payment_proprotion' => '30%',
                'img_url' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1539597503132&di=18843b8ded2edc3674ebe1af942d0f9f&imgtype=0&src=http%3A%2F%2Fpic2.ooopic.com%2F12%2F35%2F09%2F00b1OOOPIC09.jpg',
                'direction' => '南北',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。',
                'flag' => 1,
                'indexpage' => 1
            ],
            [
                'estate_id' => '1',
                'title' => '2室2厅1卫',
                'subtitle' => '2室2厅1卫副标题',
                'total' => '约70万',
                'house_area' => '80m²',
                'payment_proprotion' => '30%',
                'img_url' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1539597503130&di=d454db0c706f76f8da6880290893d466&imgtype=0&src=http%3A%2F%2Fpic.58pic.com%2F58pic%2F14%2F72%2F15%2F63858PICPW9_1024.jpg',
                'direction' => '南北',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。',
                'flag' => 1,
                'indexpage' => 1
            ]
        ];

        DB::table('estate_article')->insert($list);
    }
}
