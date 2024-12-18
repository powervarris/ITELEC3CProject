<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCardsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('post_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_cards');
    }
};
