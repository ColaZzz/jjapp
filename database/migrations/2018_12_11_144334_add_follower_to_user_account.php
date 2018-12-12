<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFollowerToUserAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_account', function(Blueprint $table){
            $table->string('follow')->default(0)->comment('跟进状态：1-跟进，0-无跟进');
            $table->date('follow_date')->nullable()->comment('跟进日期');
            $table->string('follower')->nullable()->comment('跟进人员');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_account', function(Blueprint $table){
            $table->dropColumn('follow');
            $table->dropColumn('follow_date');
            $table->dropColumn('follower');
        });
    }
}
