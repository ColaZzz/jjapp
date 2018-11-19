<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateArticleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_article_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estate_article_id')->unsigned()->comment('外键');
            $table->text('img_url')->comment('图片地址');
            $table->integer('rank')->nullable()->comment('排序');
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
        Schema::dropIfExists('estate_article_images');
    }
}
