<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFloorImageToShopFloor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_floor', function(Blueprint $table){
            $table->text('floor_img_url')->nullable()->comment('楼层落位图');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_floor', function(Blueprint $table){
            $table->dropColumn('floor_img_url');
        });
    }
}
