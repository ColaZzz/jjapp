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
            $table->integer('business_id');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->comment('副标题');
            $table->text('content')->comment('简介');
            $table->string('information')->comment('基础信息');
            $table->string('position')->comment('定位');
            $table->string('telephone')->comment('电话');
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
