<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('artist')->nullable();
            $table->string('category')->nullable();
            $table->string('description')->nullable();
            $table->string('video_path')->nullable();
            $table->string('video_size')->nullable();
            $table->integer('song_react_count')->default(0);
            $table->integer('song_download_count')->default(0);
            $table->integer('created_user');
            $table->integer('updated_user');
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
        Schema::dropIfExists('song');
    }
}
