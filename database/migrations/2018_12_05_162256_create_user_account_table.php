<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable()->comment('用户名');
            $table->string('user_number')->nullable()->comment('用户联系方式');
            $table->date('visit')->nullable()->comment('上门时间');
            $table->string('worker')->nullable()->comment('置业顾问');
            $table->string('mode')->nullable()->comment('上门渠道');
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
        Schema::dropIfExists('user_account');
    }
}
