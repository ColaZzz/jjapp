<?php

use Illuminate\Database\Seeder;
use App\Models\EstateRole;

class LinkageRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstateRole::insert([
            ['linkage_role' => 0, 'linkage_name' => '普通用户'],
            ['linkage_role' => 1, 'linkage_name' => '电商驻场'],
            ['linkage_role' => 2, 'linkage_name' => '销售组'],
            ['linkage_role' => 3, 'linkage_name' => '客服组'],
        ]);
    }
}
