<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('姓名');
            $table->string('sex')->comment('性别');
            $table->string('number')->comment('联系方式');
            $table->string('business')->comment('经营业态');
            $table->string('brand')->comment('品牌名称');
            $table->string('area')->comment('铺位面积');
            $table->text('file')->comment('文件地址');
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
        Schema::dropIfExists('investment');
    }
}
