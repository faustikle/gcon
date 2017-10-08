<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFluxosDeCaixaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fluxos_de_caixa', function (Blueprint $table) {
            $table->increments('fluxo_de_caixa_id');
            $table->integer('condominio_id')->unsigned();
            $table->double('saldo_inicial', 15, 2);
            $table->timestamps();

            $table->foreign('condominio_id')->references('condominio_id')->on('condominios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fluxos_de_caixa');
    }
}
