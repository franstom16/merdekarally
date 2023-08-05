<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_assestments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id')->unique();
            $table->timestamp('start_race');
            $table->timestamp('post_1');
            $table->timestamp('post_2');
            $table->timestamp('post_3');
            $table->timestamp('finish_race');
            $table->timestamps();
            $table->foreign('participant_id')->references('id')->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competition_assestments');
    }
}
