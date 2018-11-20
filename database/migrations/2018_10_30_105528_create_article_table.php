<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->text('img_url')->comment('封面图片');
            $table->string('subtitle')->comment('副标题');
            $table->string('state')->comment('文章状态');
            $table->text('information')->comment('文章信息');
            $table->integer('rank')->comment('排序');
            $table->integer('flag')->default(0)->comment('类型标识');
            $table->integer('type')->comment('文章类型');
            $table->integer('indexpage')->default(0)->comment('是否显示在首页');
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
        Schema::dropIfExists('articles');
    }
}
