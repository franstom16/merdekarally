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
        Schema::dropIfExists('Participants');
        Schema::create('Participants', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email_reg')->nullable();
            $table->string('email');
            $table->string('panggilan')->nullable();
            $table->string('hp')->nullable();
            $table->string('domisili')->nullable();
            $table->string('kontak_darurat')->nullable();
            $table->string('hp_darurat')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('rhesus')->nullable();
            $table->string('kelaslomba')->nullable();
            $table->string('team')->nullable();
            $table->string('anggota_team')->nullable();
            $table->string('merk')->nullable();
            $table->string('model')->nullable();
            $table->string('nopol')->nullable();
            $table->string('penyakit')->nullable();
            $table->string('agreement')->nullable();
            $table->string('payment')->nullable();

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
        Schema::dropIfExists('Participants');
    }
}
