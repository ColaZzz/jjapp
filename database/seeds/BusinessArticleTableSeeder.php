<?php

use Illuminate\Database\Seeder;

class BusinessArticleTableSeeder extends Seeder
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
                'business_id' => 1,
                'title' => '沃尔玛',
                'subtitle' => '进店任意消费即可+1元换购',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。',
                'img_url' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1539853713700&di=c4d922bc7cb953ad81c2457f8fdba589&imgtype=0&src=http%3A%2F%2Fimage.joyj.com%2Fimg%2F2017%2F02%2F14%2F6c35b33dde5d71a12c9607b8f1201913.png',
                'information' => 'https://img.alicdn.com/imgextra/i1/3981779975/O1CN012NYbDpEsmMK9drn_!!3981779975.jpg_2200x2200Q90s50.jpg_.webp',
                'position' => '1F118',
                'telephone' => '123456',
                'rank' => 1
            ],
            [
                'business_id' => 1,
                'title' => '麦当劳',
                'subtitle' => '进店任意消费即可+1元换购',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。',
                'img_url' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1539853847605&di=60c0bf2b27cf0e38843d17b66b216004&imgtype=0&src=http%3A%2F%2Fwximg.404wx.com%2Fmmbiz.qpic.cn%2Fmmbiz_jpg%2F29eTOHmjsJibxlvEsQFk89pYyrhVqCRaaljibibPiaH2YMgTzxcuVBsVPrHpdSkG8fU2tibJlUHzHPlicF42GwpHBlBw%2F0%3Fwx_fmt%3Djpeg',
                'information' => 'https://img.alicdn.com/imgextra/i2/2616970884/TB2_vlTXJknBKNjSZKPXXX6OFXa_!!2616970884.jpg_2200x2200Q90s50.jpg_.webp',
                'position' => '-1F100',
                'telephone' => '122333',
                'rank' => 2
            ],
        ];
        DB::table('business_article')->insert($list);
    }
}
