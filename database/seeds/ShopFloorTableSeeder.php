<?php

use Illuminate\Database\Seeder;
use App\Models\ShopFloor;

class ShopFloorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [[
            'floor_name' => '1F',
        ],[
            'floor_name' => '2F',
        ],[
            'floor_name' => '3F',
        ],[
            'floor_name' => '4F',
        ]];

        ShopFloor::insert($arr);
    }
}
