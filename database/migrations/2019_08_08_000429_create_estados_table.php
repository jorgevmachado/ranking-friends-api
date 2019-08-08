<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_estado', function (Blueprint $table) {
            $table
                ->bigIncrements('cd_estado')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string('no_estado',250)
                ->comment('Nome do estado');
            $table
                ->unsignedInteger('cd_pais')
                ->comment('Código chave estrangeira FK da tabela tb_pais');
            $table
                ->string('sg_estado',3)
                ->comment('Sigla do estado');
            $table
                ->foreign('cd_pais')
                ->references('cd_pais')
                ->on('tb_pais')
                ->onDelete('cascade');
            $table
                ->timestamp('ts_criado')
                ->comment('Data e hora de criação do registro');
            $table
                ->timestamp('ts_atualizado')
                ->nullable()
                ->comment('Data e hora de atualização do registro');
            $table
                ->softDeletes('ts_removido')
                ->comment('Data e hora de atualização do registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_estado');
    }
}
