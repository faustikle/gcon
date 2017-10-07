<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominios', function (Blueprint $table) {
            $table->increments('condominio_id');
            $table->string('nome');
            $table->boolean('ativo')->default(false);
            $table->integer('cidade_id');
            $table->integer('fluxo_de_caixa_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('cidade_id')->references('cidade_id')->on('cidades')->onDelete('cascade');
            $table->foreign('fluxo_de_caixa_id')->references('fluxo_de_caixa_id')->on('fluxos_de_caixa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('votos');
        Schema::dropIfExists('pautas');
        Schema::dropIfExists('reunioes');
        Schema::dropIfExists('condominios');
    }
}
