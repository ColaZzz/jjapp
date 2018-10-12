<?php

use Illuminate\Database\Seeder;

class EstateImageTableSeeder extends Seeder
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
                'imgurl' => 'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=551434039,3124566442&fm=26&gp=0.jpg',
            ],
            [
                'estate_id' => '1',
                'imgurl' => 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=1402356711,1306910254&fm=26&gp=0.jpg',
            ],
            [
                'estate_id' => '1',
                'imgurl' => 'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=2987407926,2669028446&fm=26&gp=0.jpg',
            ],
            [
                'estate_id' => '2',
                'imgurl' => 'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=326644710,607211770&fm=27&gp=0.jpg',
            ],
            [
                'estate_id' => '2',
                'imgurl' => 'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=1037301310,768357983&fm=26&gp=0.jpg',
            ],
            [
                'estate_id' => '2',
                'imgurl' => 'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=2697737199,721540742&fm=26&gp=0.jpg',
            ],
            [
                'estate_id' => '3',
                'imgurl' => 'https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=592440398,2107762530&fm=27&gp=0.jpg',
            ],
            [
                'estate_id' => '3',
                'imgurl' => 'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=49117015,2931911330&fm=26&gp=0.jpg',
            ],
            [
                'estate_id' => '3',
                'imgurl' => 'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3570745301,2849629221&fm=26&gp=0.jpg',
            ]
        ];

        DB::table('estate_image')->insert($list);
    }
}
