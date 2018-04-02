<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelLanding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('periode_id');
            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');

            $table->string('header_image')->nullable();
            $table->string('slogan')->nullable();
            $table->string('sub_slogan')->nullable();
            $table->string('profile_video')->nullable();
            $table->text('profile_desc')->nullable();
            $table->longText('term_condition')->nullable();
            $table->longText('press_release')->nullable();

            $table->date('schedule_oprec')->nullable();
            $table->date('schedule_day')->nullable();
            $table->date('schedule_winner')->nullable();

            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();

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
        Schema::dropIfExists('landing');
    }
}
