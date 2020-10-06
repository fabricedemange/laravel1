<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Filmables extends Migration
{
    public function up()
    {
        Schema::create('filmables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('film_id');
            $table->foreign('film_id')
                ->references('id')
                ->on('films')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->morphs('filmable');
        });
    }

    public function down()
    {
        Schema::dropIfExists('filmable');
    }
}
