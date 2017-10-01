<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convites', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->string('nome');
            $table->string('numero_apartamento');
            $table->string('bloco')->nullable();
            $table->timestamp('created_at');
            $table->integer('condominio_id')->unsigned();

            $table->foreign('condominio_id')->references('condominio_id')->on('condominios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convites');
    }
}
