<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReunioesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunioes', function (Blueprint $table) {
            $table->increments('reuniao_id');
            $table->string('titulo');
            $table->dateTime('data_abertura');
            $table->dateTime('data_encerramento');
            $table->boolean('ativo')->default(true);
            $table->integer('condominio_id')->unsigned();
            $table->timestamps();

            $table->foreign('condominio_id')->references('condominio_id')->on('condominios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pautas');
        Schema::dropIfExists('reunioes');
    }
}
