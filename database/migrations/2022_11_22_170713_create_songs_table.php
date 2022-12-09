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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->foreignId('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->string('title');
            $table->float('length');
            $table->integer('track');
            $table->integer('disc');
            $table->text('lyrics');
            $table->text('path');
            $table->integer('mtime');
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
        Schema::dropIfExists('songs');
    }
};
