<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageAndVideoPathToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'image_path')) {
                $table->string('image_path')->nullable();
            }
            if (!Schema::hasColumn('posts', 'video_path')) {
                $table->string('video_path')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'image_path')) {
                $table->dropColumn('image_path');
            }
            if (Schema::hasColumn('posts', 'video_path')) {
                $table->dropColumn('video_path');
            }
        });
    }
};
