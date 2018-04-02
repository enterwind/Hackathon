<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('plain')->nullable();
            $table->string('asal')->nullable();
            $table->text('alamat')->nullable();

            $table->integer('status')->default(0);
            
            $table->text('easter_egg')->nullable();
            $table->string('tgl_konek')->nullable();

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
        Schema::dropIfExists('team');
    }
}
