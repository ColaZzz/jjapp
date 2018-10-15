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
            $table->string('total');
            $table->string('house_area');
            $table->string('payment_proprotion');
            $table->string('direction');
            $table->string('content');
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
