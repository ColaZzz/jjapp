<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->comment('所属商铺外键');
            $table->string('name')->comment('商品名称');
            $table->float('price')->nullable()->comment('商品价格');
            $table->text('img_url')->nullable()->comment('封面');
            $table->integer('rank')->default(0)->comment('商品排序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commodities');
    }
}
