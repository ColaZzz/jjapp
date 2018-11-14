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
        $this->call(BusinessTableSeeder::class);
        $this->call(BusinessArticleTableSeeder::class);
        $this->call(BusinessArticleImageTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(LinkageTokenSeeder::class);
    }
}
