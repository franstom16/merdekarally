<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->integer('min_time');
            $table->integer('max_time');
            $table->integer('score');
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('race_class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('race_scores');
    }
}
