<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedTableUserNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user_notifity",function (Blueprint $table){
            $table->increments("id");
            $table->integer("user_id");
            $table->integer("is_read");
            $table->integer("post_id");
            $table->integer("location");
            $table->integer("attention_user_id");
            $table->integer("type");
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
        Schema::dropIfExists("user_notifty");
    }
}
