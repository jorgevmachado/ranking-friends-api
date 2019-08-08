<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePontuacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pontuacao', function (Blueprint $table) {
            $table
                ->bigIncrements('cd_pontuacao')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->integer('nr_pontuacao')
                ->comment('Quantidade de pontos');
            $table
                ->string('ds_pontuacao', 250)
                ->comment('Descrição da pontuação');
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
        Schema::dropIfExists('tb_pontuacao');
    }
}
