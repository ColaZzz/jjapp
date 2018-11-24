<?php

use Illuminate\Database\Seeder;
use App\Models\ShopBusiness;

class ShopBusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [[
            'business_name' => '餐饮',
        ],[
            'business_name' => '服装',
        ],[
            'business_name' => '休闲娱乐',
        ],[
            'business_name' => '数码',
        ]];
        ShopBusiness::insert($arr);
    }
}
