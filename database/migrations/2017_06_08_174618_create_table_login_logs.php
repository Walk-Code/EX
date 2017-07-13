<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLoginLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("login_log",function (Blueprint $table){
            $table->increments('id');
            $table->string('ip');
            $table->string('login_time');
            $table->integer('user_id');
            $table->text('address');
            $table->string('device');
            $table->string('browser');
            $table->string('platform');
            $table->string('language');
            $table->string('device_type');
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
        Schema::dropIfExists("login_log");
    }
}
