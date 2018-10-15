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
    }
}
