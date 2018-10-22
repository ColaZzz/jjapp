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
            $table->integer('estate_id');
            $table->string('title');
            $table->string('subtitle');
            $table->string('total');
            $table->string('house_area');
            $table->string('payment_proprotion');
            $table->text('img_url');
            $table->string('direction');
            $table->string('content')->nullable()->nullable();
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
