<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipTeamsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_teams_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id');
            $table->string('participant_code');
            $table->time('start_race')->nullable();
            $table->time('post_1')->nullable();
            $table->time('post_2')->nullable();
            $table->time('post_3')->nullable();
            $table->time('finish_race')->nullable();
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
        Schema::dropIfExists('championship_teams_members');
    }
}
