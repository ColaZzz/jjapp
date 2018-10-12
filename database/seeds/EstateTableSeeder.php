<?php

use Illuminate\Database\Seeder;

class EstateTableSeeder extends Seeder
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
                'title' => '美丽城',
                'area' => '河源·源城',
                'address' => '河源市越王大道',
                'state' => '开盘',
                'price' => '8000元/m²',
                'icon_url' => 'http://img4.imgtn.bdimg.com/it/u=619442518,412108890&fm=26&gp=0.jpg',
                'img_url' => 'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=551434039,3124566442&fm=26&gp=0.jpg',
                'flag' => '1'
            ],
            [
                'title' => '楼盘A',
                'area' => '河源·源城',
                'address' => '河源市越王大道',
                'state' => '开盘',
                'price' => '8000元/m²',
                'icon_url' => 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=371772476,1548437417&fm=26&gp=0.jpg',
                'img_url' => 'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=326644710,607211770&fm=27&gp=0.jpg',
                'flag' => '1'
            ],
            [
                'title' => '楼盘B',
                'area' => '河源·源城',
                'address' => '河源市越王大道',
                'state' => '开盘',
                'price' => '8000元/m²',
                'icon_url' => 'http://img1.imgtn.bdimg.com/it/u=2606395277,2974518114&fm=26&gp=0.jpg',
                'img_url' => 'https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=592440398,2107762530&fm=27&gp=0.jpg',
                'flag' => '1'
            ]
        ];

        DB::table('estates')->insert($list);
    }
}
