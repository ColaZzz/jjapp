<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id')->unsigned();
            $table->string('title')->comment('标题');
            $table->string('subtitle')->comment('副标题');
            $table->text('content')->comment('简介');
            $table->text('img_url')->comment('封面图片');
            $table->text('information')->nullable()->comment('基础信息');
            $table->string('position')->nullable()->comment('定位');
            $table->string('telephone')->nullable()->comment('电话');
            $table->integer('rank')->nullable()->comment('排序');
            $table->integer('flag')->nullable()->comment('类型标识');
            $table->integer('indexpage')->nullable()->comment('是否显示在封面');
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
        Schema::dropIfExists('business_article');
    }
}
