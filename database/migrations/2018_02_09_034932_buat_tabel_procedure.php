<?php

/* Author : Noviyanto Rahmadi
 * E-mail : novay@enterwind.com
 * Copyright 2018 The EnterWind Inc. */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('icon');
            $table->string('label');
            $table->text('desc');
            $table->integer('order')->default(0);
            
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
        Schema::dropIfExists('procedure');
    }
}
