<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estate_id')->unsigned()->comment('外键');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->comment('副标题');
            $table->string('total')->comment('总价');
            $table->string('house_area')->comment('面积');
            $table->string('payment_proprotion')->comment('首付占比');
            $table->text('img_url')->comment('封面');
            $table->string('direction')->comment('装修标准');
            $table->text('content')->nullable()->nullable()->comment('内容简介');
            $table->integer('flag')->nullable()->comment('类型标识');
            $table->integer('rank')->nullable()->comment('排序');
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
        Schema::dropIfExists('estate_article');
    }
}
