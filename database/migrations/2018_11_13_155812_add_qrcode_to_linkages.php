<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQrcodeToLinkages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('linkages', function (Blueprint $table) {
            $table->string('qrcode')->nullable()->comment('二维码key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('linkages', function (Blueprint $table) {
            $table->dropColumn('qrcode');
        });
    }
}
