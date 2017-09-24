<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosCondominioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_condominio', function (Blueprint $table) {
            $table->integer('documento_id')->unsigned();
            $table->integer('condominio_id')->unsigned();
            $table->timestamps();

            $table->foreign('documento_id')->references('documento_id')->on('documentos');
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
        Schema::dropIfExists('documentos_condominio');
    }
}
