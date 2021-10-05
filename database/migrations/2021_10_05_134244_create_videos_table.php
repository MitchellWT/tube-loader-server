<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * id
         * downloaded boolean 
         * queued boolean
         * videoid string
         * title string
         * thumbnail string
         * timecreated timestamp
         * timedownloaded timestamp
         */
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->boolean('downloaded')->default(false);
            $table->boolean('queued')->default(true);
            $table->string('video_id', 255);
            $table->string('title', 150);
            $table->string('thumbnail', 255);
            $table->timestamps();
            $table->timestamp('downloaded_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
