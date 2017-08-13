<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usuario_id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('numero_apartamento')->nullable();
            $table->string('bloco')->nullable();
            $table->boolean('ativo')->default(false);
            $table->dateTime('ultimo_acesso');
            $table->enum('funcao', ['Administrador', 'Sindico', 'Morador', 'Visitante']);
            $table->integer('condominio_id')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
