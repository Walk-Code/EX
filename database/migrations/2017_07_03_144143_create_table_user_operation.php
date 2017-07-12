<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserOperation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user_operation",function (Blueprint $table) {
            $table->increments("id");
            $table->string("ip_address")->comment("ip地址");
            $table->integer("user_id")->comment("用户");
            $table->string("times")->comment("访问时间");
            $table->string("position")->comment("访问页面");
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
        Schema::dropIfExists("user_operation");
    }
}
