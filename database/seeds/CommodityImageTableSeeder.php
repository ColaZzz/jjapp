<?php

use Illuminate\Database\Seeder;
use App\Models\CommodityImage;
use App\Models\Commodity;

class CommodityImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commodity_ids = Commodity::pluck('id');
        $faker = app(Faker\Generator::class);
        $commodityImages = factory(CommodityImage::class)->times(4000)->make()->each(function($commodityImage) use ($faker, $commodity_ids){
            $commodityImage->commodity_id = $faker->randomElement($commodity_ids->toArray());
        });
        CommodityImage::insert($commodityImages->toArray());
    }
}
