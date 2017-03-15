<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rasp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_Fack');
            $table->integer('id_Group');
            $table->string('Course');
            $table->string('Name_pr');
            $table->string('Number_pr');
            $table->string('Name_lector');
            $table->string('Number_aud');
            $table->string('Day');
            $table->string('Week');

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
        Schema::dropIfExists('Rasp');
    }
}
