<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRommsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('romms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->string('status',1)->default('A');// 'A' Ativo, 'I' Inativo
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
        Schema::drop('romms');
    }
}
