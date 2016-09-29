<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->integer('id_romm')->unsigned();
            $table->foreign('id_romm')->references('id')->on('romms');

            $table->integer('id_mic')->unsigned();
            $table->foreign('id_mic')->references('id')->on('microphones');

            $table->integer('id_proj')->unsigned();
            $table->foreign('id_proj')->references('id')->on('projectors');

            $table->integer('id_not')->unsigned();
            $table->foreign('id_not')->references('id')->on('laptops');

            $table->integer('id_sound')->unsigned();
            $table->foreign('id_sound')->references('id')->on('sounds');

            $table->date('date');

            $table->time('hbegin');

            $table->time('hend');
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
        Schema::drop('reserves');
    }
}
