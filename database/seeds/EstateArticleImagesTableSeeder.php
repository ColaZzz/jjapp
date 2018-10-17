<?php

use Illuminate\Database\Seeder;

class EstateArticleImagesTableSeeder extends Seeder
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
                'estate_article_id' => '1',
                'imgurl' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1539597503133&di=91def7b745718aeefdb274ed28da4cf4&imgtype=0&src=http%3A%2F%2Fpic2.ooopic.com%2F13%2F07%2F27%2F58b2OOOPIC92_1024.jpg',
            ],
            [
                'estate_article_id' => '2',
                'imgurl' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1539597503132&di=18843b8ded2edc3674ebe1af942d0f9f&imgtype=0&src=http%3A%2F%2Fpic2.ooopic.com%2F12%2F35%2F09%2F00b1OOOPIC09.jpg',
            ],
            [
                'estate_article_id' => '3',
                'imgurl' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1539597503130&di=d454db0c706f76f8da6880290893d466&imgtype=0&src=http%3A%2F%2Fpic.58pic.com%2F58pic%2F14%2F72%2F15%2F63858PICPW9_1024.jpg',
            ]
        ];

        DB::table('estate_article_images')->insert($list);
    }
}
