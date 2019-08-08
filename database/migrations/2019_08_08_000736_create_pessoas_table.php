<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pessoa', function (Blueprint $table) {
            $table
                ->bigIncrements('cd_pessoa')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string('no_nome',150)
                ->comment('Primeiro nome da pessoa.');
            $table
                ->string('no_sobrenome',150)
                ->comment('Sobrenome da pessoa.');
            $table
                ->date('dt_nascimento')
                ->comment('Data de nascimento da pessoa.');
            $table
                ->enum('ic_sexo', ['M', 'F'])
                ->comment('Sexo da pessoa.');
            $table
                ->unsignedInteger('cd_estado_civil')
                ->comment('Código chave estrangeira FK da tabela tb_estado_civil');
            $table
                ->foreign('cd_estado_civil')
                ->references('cd_estado_civil')
                ->on('tb_estado_civil')
                ->onDelete('cascade');
            $table
                ->unsignedInteger('cd_categoria')
                ->comment('Código chave estrangeira FK da tabela tb_categoria');
            $table
                ->foreign('cd_categoria')
                ->references('cd_categoria')
                ->on('tb_categoria')
                ->onDelete('cascade');
            $table
                ->unsignedInteger('cd_pontuacao')
                ->comment('Código chave estrangeira FK da tabela tb_pontuacao');
            $table
                ->foreign('cd_pontuacao')
                ->references('cd_pontuacao')
                ->on('tb_pontuacao')
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
        Schema::dropIfExists('tb_pessoa');
    }
}
