<?php

use Illuminate\Database\Seeder;

class BusinessTableSeeder extends Seeder
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
                'title' => 'JJmall',
                'subtitle' => '这里处于商业中心',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。',
                'address' => '河源市越王大道',
                'icon_url' => '',
                'img_url' => 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=371772476,1548437417&fm=26&gp=0.jpg',
                'telephone' => '123456',
                'flag' => 0,
                'rank' => 99,
                'latitude' => 23.770814,
                'longitude' => 114.720472
            ],
            [
                'title' => '桃花水母大剧院',
                'subtitle' => '这里处于商业中心',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。',
                'address' => '河源市越王大道',
                'icon_url' => '',
                'img_url' => 'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=551434039,3124566442&fm=26&gp=0.jpg',
                'telephone' => '123456',
                'flag' => 0,
                'rank' => 95,
                'latitude' => 23.771786,
                'longitude' => 114.717361
            ],
        ];
        DB::table('business')->insert($list);
    }
}
