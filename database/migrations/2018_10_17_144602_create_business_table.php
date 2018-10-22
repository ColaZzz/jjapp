<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->nullable()->comment('副标题');
            $table->string('content')->nullable()->comment('简介');
            $table->string('address')->comment('地址');
            $table->text('icon_url')->nullable()->comment('商标图片');
            $table->text('img_url')->comment('封面图片');
            $table->string('telephone')->comment('电话');
            $table->integer('flag')->comment('类型标识');
            $table->integer('rank')->nullable()->comment('排序');
            $table->float('latitude', 10, 7)->nullable()->comment('纬度');
            $table->float('longitude', 10, 7)->nullable()->comment('经度');
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
        Schema::dropIfExists('business');
    }
}
