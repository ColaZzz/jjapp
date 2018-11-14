<?php

use Illuminate\Database\Seeder;
use App\Models\LinkageToken;

class LinkageTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LinkageToken::insert(['username'=>'admin','passwd'=>md5('jj')]);
    }
}
