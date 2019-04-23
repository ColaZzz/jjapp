<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBusinessHoursToShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //增业商品营业时间字段
        Schema::table('shops', function(Blueprint $table){
            $table->string('business_hours')->nullable()->comment('营业时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function(Blueprint $table){
            $table->dropColumn('business_hours');
        });
    }
}
