<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(EstateTableSeeder::class);
        $this->call(EstateImageTableSeeder::class);
        $this->call(EstateArticleTableSeeder::class);
        $this->call(EstateArticleImagesTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(LinkageTokenTableSeeder::class);

        // mall
        $this->call(ShopBusinessTableSeeder::class);
        $this->call(ShopFloorTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(CommodityTableSeeder::class);
        $this->call(CommodityImageTableSeeder::class);
    }
}
