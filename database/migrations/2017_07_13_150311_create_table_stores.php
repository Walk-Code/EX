<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("stores",function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id");
            $table->integer("post_id")->comment("话题id");
            $table->integer("type")->comment("0:主题1:人");
            $table->integer("attention_user_id")->comment("关注人");
            $table->string("ip_address");
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
        Schema::dropIfExists("stores");
    }
}
