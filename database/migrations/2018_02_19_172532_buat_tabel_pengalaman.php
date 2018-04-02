<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPengalaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_pengalaman', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('team_id');
            $table->foreign('team_id')->references('id')->on('team')->onDelete('cascade');
            
            $table->string('keterangan')->nullable();
            $table->string('file')->nullable();

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
        Schema::dropIfExists('team_pengalaman');
    }
}
