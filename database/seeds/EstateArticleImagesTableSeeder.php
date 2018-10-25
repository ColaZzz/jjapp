<?php

use Illuminate\Database\Seeder;
use App\Models\EstateArticle;
use App\Models\EstateArticleImage;

class EstateArticleImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estateArticle_id = EstateArticle::pluck('id');
        $faker = app(Faker\Generator::class);
        $estateArticleImages = factory(EstateArticleImage::class)->times(500)->make()->each(function ($estateArticleImage) use ($faker,$estateArticle_id) {
            $estateArticleImage->estate_article_id = $faker->randomElement($estateArticle_id->toArray());
        });
        EstateArticleImage::insert($estateArticleImages->toArray());
    }
}
