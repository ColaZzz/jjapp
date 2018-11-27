<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('店名');
            $table->string('subtitle')->nullable()->comment('副标题');
            $table->text('img_url')->nullable()->comment('封面图片');
            $table->string('address')->nullable()->comment('识别地址');
            $table->text('introduction')->nullable()->comment('店铺介绍');
            $table->integer('type_top')->default(0)->comment('是否置顶');
            $table->integer('shop_floor_id')->comment('楼层外键');
            $table->integer('shop_business_id')->comment('业态（分类）外键');
            $table->string('customize_type')->nullable()->comment('自定义二级分类');
            $table->integer('average_spent')->nullable()->comment('人均消费');
            $table->integer('indexpage')->default(0)->comment('是否显示在首页');
            $table->integer('flag')->default(0)->comment('类型标识：商业-0');
            $table->string('search_word')->nullable()->comment('搜索关键字');
            $table->integer('rank')->default(0)->comment('商铺排序');
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
        Schema::dropIfExists('shops');
    }
}
