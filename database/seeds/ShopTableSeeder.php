<?php

use Illuminate\Database\Seeder;
use App\Models\ShopBusiness;
use App\Models\ShopFloor;
use App\Models\Shop;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shop_floor_ids = ShopFloor::pluck('id');
        $shop_floor_names = ShopFloor::pluck('floor_name');
        $shop_business_ids = ShopBusiness::pluck('id');
        $faker = app(Faker\Generator::class);
        $shops = factory(Shop::class)->times(80)->make()->each(function ($shop) use ($faker, $shop_floor_ids, $shop_business_ids, $shop_floor_names) {
            $shop->shop_floor_id = $faker->randomElement($shop_floor_ids->toArray());
            $shop->shop_business_id = $faker->randomElement($shop_business_ids->toArray());
            $shop->address = $faker->randomElement($shop_floor_names->toArray()).$faker->numberBetween($min = 1, $max = 200);
        });

        Shop::insert($shops->toArray());
    }
}
