<?php

use Illuminate\Database\Seeder;
use App\Models\EstateImage;
use App\Models\Estate;

class EstateImageTableSeeder extends Seeder
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

        $estate_images = factory(EstateImage::class)->times(100)->make()->each(function ($estate_image) use ($faker, $estate_id){
            $estate_image->estate_id = $faker->randomElement($estate_id->toArray());
        });

        EstateImage::insert($estate_images->toArray());
    }
}
