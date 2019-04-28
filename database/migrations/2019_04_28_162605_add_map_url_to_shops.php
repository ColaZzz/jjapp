<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMapUrlToShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //增业店铺导航字段
        Schema::table('shops', function(Blueprint $table){
            $table->string('map_url')->nullable()->comment('店铺地址图片');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //增
        Schema::table('shops', function(Blueprint $table){
            $table->drop('map_url');
        });
    }
}
