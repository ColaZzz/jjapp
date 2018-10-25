<?php

use Illuminate\Database\Seeder;
use App\Models\Estate;

class EstateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = app(Faker\Generator::class);

        $estates = factory(Estate::class)->times(20)->make();

        Estate::insert($estates->toArray());

        
        $first = Estate::find(1);
        $first->latitude = 23.770186;
        $first->longitude = 114.715708;
        $first->rank = 1000;
        $first->title = '坚基·美好城';
        $first->save();

        $second = Estate::find(2);
        $second->latitude = 23.771079;
        $second->longitude = 114.714131;
        $second->rank = 999;
        $second->title = '坚基·美丽城';
        $second->save();
    }
}
