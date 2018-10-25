<?php

use Illuminate\Database\Seeder;
use App\Models\Estate;
use App\Models\EstateArticle;

class EstateArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estate_id = Estate::pluck('id');
        $faker = app(Faker\Generator::class);
        $estateArticles = factory(EstateArticle::class)->times(100)->make()->each(function ($estateArticle) use ($faker,$estate_id) {
            $estateArticle->estate_id = $faker->randomElement($estate_id->toArray());
        });
        EstateArticle::insert($estateArticles->toArray());
    }
}
