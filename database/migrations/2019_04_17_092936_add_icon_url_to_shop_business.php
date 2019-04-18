<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconUrlToShopBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //增加业态图标字段
        Schema::table('shop_business', function(Blueprint $table){
            $table->text('icon_url')->nullable()->comment('业态图标地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('shop_business', function(Blueprint $table){
            $table->dropColumn('icon_url');
        });
    }
}
