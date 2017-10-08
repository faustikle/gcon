<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosLancamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_lancamento', function (Blueprint $table) {
            $table->integer('documento_id')->unsigned();
            $table->integer('lancamento_id')->unsigned();

            $table->foreign('documento_id')->references('documento_id')->on('documentos');
            $table->foreign('lancamento_id')->references('lancamento_id')->on('lancamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_lancamento');
    }
}
