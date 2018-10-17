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
                'information' => 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=371772476,1548437417&fm=26&gp=0.jpg',
                'position' => '1F118',
                'telephone' => '123456'
            ],
            [
                'business_id' => 1,
                'title' => '麦当劳',
                'subtitle' => '进店任意消费即可+1元换购',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。',
                'information' => 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=371772476,1548437417&fm=26&gp=0.jpg',
                'position' => '-1F100',
                'telephone' => '122333'
            ],
        ];
        DB::table('business_article')->insert($list);
    }
}
