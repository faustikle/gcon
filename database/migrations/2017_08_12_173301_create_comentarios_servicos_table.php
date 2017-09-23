<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios_servicos', function (Blueprint $table) {
            $table->increments('comentario_servico_id');
            $table->text('comentario');
            $table->integer('usuario_id')->unsigned();
            $table->integer('servico_id')->unsigned();
            $table->timestamps();

            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->onDelete('cascade');
            $table->foreign('servico_id')->references('servico_id')->on('servicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios_servicos');
    }
}
