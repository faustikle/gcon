<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Financeiro\Lancamento;

class CreateLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->increments('lancamentos_id');
            $table->double('valor', 15, 2);
            $table->string('descricao');
            $table->enum('tipo', [Lancamento::DESPESA, Lancamento::RECEITA]);
            $table->string('observacao')->nullable();
            $table->integer('fluxo_de_caixa_id')->unsigned();
            $table->integer('categoria_lancamento_id')->unsigned();
            $table->timestamps();

            $table->foreign('fluxo_de_caixa_id')->references('fluxo_de_caixa_id')->on('fluxo_de_caixa');
            $table->foreign('categoria_lancamento_id')->references('categoria_lancamento_id')->on('categorias_lancamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamentos');
    }
}
