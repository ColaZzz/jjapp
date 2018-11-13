<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('外键');
            $table->string('platform')->nullable()->comment('电商平台');
            $table->string('project')->nullable()->comment('联动项目');
            $table->string('company')->nullable()->comment('公司名称');
            $table->string('worker')->nullable()->comment('工作人员');
            $table->string('worker_number')->nullable()->comment('工作人员联系电话');
            $table->string('user')->nullable()->comment('客户姓名');
            $table->string('user_number')->nullable()->comment('客户联系电话');
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
        Schema::dropIfExists('linkages');
    }
}
