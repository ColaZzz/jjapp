<?php

use Illuminate\Database\Seeder;

class BusinessArticleImageTableSeeder extends Seeder
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
                'business_article_id' => '1',
                'imgurl' => 'http://img3.imgtn.bdimg.com/it/u=2794047399,395333304&fm=26&gp=0.jpg',
                'rank' => '2',
            ],
            [
                'business_article_id' => '1',
                'imgurl' => 'http://img1.imgtn.bdimg.com/it/u=3679690635,1695586754&fm=26&gp=0.jpg',
                'rank' => '98',
            ],
            [
                'business_article_id' => '1',
                'imgurl' => 'http://img2.imgtn.bdimg.com/it/u=3016972095,920746655&fm=26&gp=0.jpg',
                'rank' => '96',
            ],
            [
                'business_article_id' => '1',
                'imgurl' => 'http://img2.imgtn.bdimg.com/it/u=3046476480,1361760990&fm=200&gp=0.jpg',
                'rank' => '3',
            ],
            [
                'business_article_id' => '1',
                'imgurl' => 'http://img0.imgtn.bdimg.com/it/u=594974538,4096062898&fm=26&gp=0.jpg',
                'rank' => '5',
            ],
            [
                'business_article_id' => '2',
                'imgurl' => 'http://img5.imgtn.bdimg.com/it/u=10492361,2374804098&fm=26&gp=0.jpg',
                'rank' => '3',
            ],
            [
                'business_article_id' => '2',
                'imgurl' => 'http://img2.imgtn.bdimg.com/it/u=3492256390,2226188480&fm=26&gp=0.jpg',
                'rank' => '5',
            ],
        ];
        DB::table('business_article_image')->insert($list);
    }
}
