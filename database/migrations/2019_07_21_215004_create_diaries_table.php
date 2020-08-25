<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spot_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->integer('score');
            $table->integer('condition');
            $table->integer('size');
            $table->string('body');
            $table->string('image_path')->nullable();
            $table->timestamps();

            // 外部キー設定
            $table->foreign('spot_id')->references('id')->on('spots')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diaries');
    }
}
