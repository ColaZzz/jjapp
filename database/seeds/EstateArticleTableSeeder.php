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
                'total' => '约90万',
                'house_area' => '106m²',
                'payment_proprotion' => '30%',
                'direction' => '南北',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。'
            ],
            [
                'estate_id' => '1',
                'title' => '2室2厅2卫',
                'total' => '约73万',
                'house_area' => '91m²',
                'payment_proprotion' => '30%',
                'direction' => '南北',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。'
            ],
            [
                'estate_id' => '1',
                'title' => '2室2厅1卫',
                'total' => '约70万',
                'house_area' => '80m²',
                'payment_proprotion' => '30%',
                'direction' => '南北',
                'content' => '简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体。'
            ]
        ];

        DB::table('estate_article')->insert($list);
    }
}
