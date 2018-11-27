<?php

use Illuminate\Database\Seeder;
use App\Models\Commodity;
use App\Models\Shop;

class CommodityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);
        $shop_id = Shop::pluck('id');
        $commodities = factory(Commodity::class)->times(800)->make()->each(function($commodity) use ($faker, $shop_id){
            $commodity->shop_id = $faker->randomElement($shop_id->toArray());
        });
        Commodity::insert($commodities->toArray());
    }
}
