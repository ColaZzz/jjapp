<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferencesArticleAndEstate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estate_image', function (Blueprint $table) {
            $table->foreign('estate_id')->references('id')->on('estates')->onDelete('cascade');
        });

        Schema::table('estate_article', function (Blueprint $table) {
            $table->foreign('estate_id')->references('id')->on('estates')->onDelete('cascade');
        });

        Schema::table('estate_article_images', function (Blueprint $table) {
            $table->foreign('estate_article_id')->references('id')->on('estate_article')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
