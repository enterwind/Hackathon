<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelTeamPeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_peserta', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('team_id');
            $table->foreign('team_id')->references('id')->on('team')->onDelete('cascade');

            $table->string('foto')->nullable();
            $table->string('nama')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->integer('status')->nullable();

            $table->integer('leader')->default(0);

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
        Schema::dropIfExists('team_peserta');
    }
}
