<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            //noted : harus setting timestamp di file migration supaya ga error pas migrate
            //noted : karena yg hrus di buat category setelah post, maka category harus di up ke atas 
            $table->unsignedBigInteger('user_id');                              //versi pixeldev
            $table->foreign('user_id')->references('id')->on('users');          //versi pixeldev

            $table->unsignedBigInteger('category_id');                              //versi pixeldev
            $table->foreign('category_id')->references('id')->on('categories');          //versi pixeldev



            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->text('description');
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
        Schema::dropIfExists('posts');
    }
};
