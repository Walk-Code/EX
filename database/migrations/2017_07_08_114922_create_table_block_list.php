<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBlockList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("block_list",function (Blueprint $table) {
            $table->increments("id");
            $table->integer("type")->comment("类型1：后台block 类型2：用户block");
            $table->string("ip_address")->comment("ip 地址");
            $table->integer("user_id")->comment("用户");
            $table->integer("attention_user_id")->comment("block用户");
            $table->string("time")->comment(" 操作时间");
            $table->softDeletes("deleted_at");
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
        Schema::dropIfExists("block_list");
    }
}
