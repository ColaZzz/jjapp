<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommodityImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity_id')->comment('所属商品外键');
            $table->text('img_url')->comment('图片地址');
            $table->integer('rank')->default(0)->comment('图片排序');
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
        Schema::dropIfExists('commodity_images');
    }
}
