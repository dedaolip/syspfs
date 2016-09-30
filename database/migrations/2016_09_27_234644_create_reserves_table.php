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

            $table->integer('id_user')();

            $table->integer('id_romm');

            $table->integer('id_mic');

            $table->integer('id_proj');

            $table->integer('id_not');

            $table->integer('id_sound');

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
