<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestadoresCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestadores_categorias', function (Blueprint $table) {
            $table->increments('prestador_categoria_id');
            $table->integer('prestador_servico_id')->unsigned();
            $table->integer('categoria_prestador_id')->unsigned();
            $table->timestamps();

            $table->foreign('prestador_servico_id')->references('prestador_servico_id')->on('prestadores_servico')->onDelete('cascade');
            $table->foreign('categoria_prestador_id')->references('categoria_prestador_id')->on('categorias_prestador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestadores_categorias');
    }
}
