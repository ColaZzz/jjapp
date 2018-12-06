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
            $table->integer('user_id')->unsigned()->comment('外键');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company')->nullable()->comment('公司名称');
            $table->string('child_company')->nullable()->comment('分店');
            $table->string('worker')->nullable()->comment('工作人员');
            $table->string('worker_number')->nullable()->comment('工作人员联系电话');
            $table->string('username')->nullable()->comment('客户姓名');
            $table->string('user_number')->nullable()->comment('客户联系电话');
            $table->string('qrcode')->nullable()->comment('二维码key');
            $table->integer('state')->default(0)->comment('二维码是否使用');
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
