<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('servico_id');
            $table->string('titulo');
            $table->text('descricao');
            $table->double('valor', 15, 2);
            $table->boolean('realizado')->default(false);
            $table->dateTime('data');
            $table->integer('condominio_id')->unsigned();
            $table->integer('prestador_servico_id')->unsigned();
            $table->timestamps();

            $table->foreign('condominio_id')->references('condominio_id')->on('condominios')->onDelete('cascade');
            $table->foreign('prestador_servico_id')->references('prestador_servico_id')->on('prestadores_servico')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
}
