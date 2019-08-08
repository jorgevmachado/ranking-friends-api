<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cidade', function (Blueprint $table) {
            $table
                ->bigIncrements('cd_cidade')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string('no_cidade',250)
                ->comment('Nome da cidade');
            $table
                ->unsignedInteger('cd_estado')
                ->comment('Código chave estrangeira FK da tabela tb_estado');
            $table
                ->foreign('cd_estado')
                ->references('cd_estado')
                ->on('tb_estado')
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
        Schema::dropIfExists('tb_cidade');
    }
}
