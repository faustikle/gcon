<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestadoresServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestadores_servico', function (Blueprint $table) {
            $table->increments('prestador_servico_id');
            $table->string('nome');
            $table->string('responsavel', 50);
            $table->string('telefone', 10)->nullable();
            $table->string('celular', 11)->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('endereco');
            $table->string('numero', 10);
            $table->string('bairro', 40);
            $table->string('cep', 8);
            $table->integer('cidade_id');
            $table->timestamps();

            $table->foreign('cidade_id')->references('cidade_id')->on('cidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestadores_servico');
    }
}
