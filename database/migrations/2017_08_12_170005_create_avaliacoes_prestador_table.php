<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacoesPrestadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes_prestador', function (Blueprint $table) {
            $table->increments('avaliacao_id');
            $table->smallInteger('avaliacao');
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
        Schema::dropIfExists('avaliacoes_prestador');
    }
}
