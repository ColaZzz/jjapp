<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('area')->comment('所属地区');
            $table->string('address')->comment('地址');
            $table->string('state')->comment('售卖状态');
            $table->string('price')->comment('价格');
            $table->text('icon_url')->comment('商标');
            $table->text('img_url')->comment('封面图片');
            $table->string('flag')->comment('类型标识');
            $table->dateTime('state_time')->nullable()->comment('开盘时间');
            $table->string('sell_address')->nullable()->comment('售楼地址');
            $table->string('property_year')->nullable()->comment('产权年限');
            $table->string('decoration')->nullable()->comment('装修标准');
            $table->string('development_company')->nullable()->comment('开发商');
            $table->string('greening')->nullable()->comment('绿化率');
            $table->string('place_area')->nullable()->comment('占地面积');
            $table->string('house_area')->nullable()->comment('住宅面积');
            $table->string('property_costs')->nullable()->comment('物业费');
            $table->string('property_company')->nullable()->comment('物业公司');
            $table->string('telephone')->nullable()->comment('电话');
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
        Schema::dropIfExists('estates');
    }
}
