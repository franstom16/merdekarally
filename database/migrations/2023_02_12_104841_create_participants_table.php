<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('participants');
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->string('participant_name');
            $table->string('participant_code')->unique();
            $table->string('race_category')->nullable();
            $table->string('race_class');
            $table->string('blood')->nullable();
            $table->timestamps();
            $table->foreign('team_id')->references('id')->on('race_teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
