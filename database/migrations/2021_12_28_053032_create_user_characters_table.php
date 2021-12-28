<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->string('name');
            $table->string('bio', 600);
            $table->integer('skill')->default(0); // TODO: determine how points are awarded into these areas
            $table->integer('reputation')->default(0); // TODO: determine how points are awarded into these areas
            $table->integer('level')->default(1);
            $table->integer('experience')->default(0);
            $table->text('profile_image_path')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_characters');
    }
}
