<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40); //nome
            $table->string('brand', 40); //marca
            $table->string('model', 40); //modelo
            $table->string('patrimony', 40); //patrimonio
            $table->date('dtaacquisition'); //data de aquisição
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
        Schema::drop('projectors');
    }
}
