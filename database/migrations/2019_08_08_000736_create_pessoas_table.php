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
        Schema::create(\App\Constants\Attribute::TB_PESSOA, function (Blueprint $table) {
            $table
                ->bigIncrements(\App\Constants\Attribute::CD_PESSOA)
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string(\App\Constants\Attribute::NO_NOME,150)
                ->comment('Primeiro nome da pessoa.');
            $table
                ->string(\App\Constants\Attribute::NO_SOBRENOME,150)
                ->comment('Sobrenome da pessoa.');
            $table
                ->date(\App\Constants\Attribute::DT_NASCIMENTO)
                ->comment('Data de nascimento da pessoa.');
            $table
                ->enum(\App\Constants\Attribute::IC_SEXO, ['M', 'F'])
                ->comment('Sexo da pessoa.');
            $table
                ->unsignedInteger(\App\Constants\Attribute::CD_ESTADO_CIVIL)
                ->comment('Código chave estrangeira FK da tabela tb_estado_civil');
            $table
                ->foreign(\App\Constants\Attribute::CD_ESTADO_CIVIL)
                ->references(\App\Constants\Attribute::CD_ESTADO_CIVIL)
                ->on('tb_estado_civil')
                ->onDelete(\App\Constants\Attribute::CASCADE);
            $table
                ->unsignedInteger(\App\Constants\Attribute::CD_CATEGORIA)
                ->comment('Código chave estrangeira FK da tabela tb_categoria');
            $table
                ->foreign(\App\Constants\Attribute::CD_CATEGORIA)
                ->references(\App\Constants\Attribute::CD_CATEGORIA)
                ->on(\App\Constants\Attribute::TB_CATEGORIA)
                ->onDelete(\App\Constants\Attribute::CASCADE);
            $table
                ->unsignedInteger(\App\Constants\Attribute::CD_PONTUACAO)
                ->comment('Código chave estrangeira FK da tabela tb_pontuacao');
            $table
                ->foreign(\App\Constants\Attribute::CD_PONTUACAO)
                ->references(\App\Constants\Attribute::CD_PONTUACAO)
                ->on(\App\Constants\Attribute::TB_PONTUACAO)
                ->onDelete(\App\Constants\Attribute::CASCADE);
            $table
                ->timestamp(\App\Constants\Attribute::TS_CRIADO)
                ->comment('Data e hora de criação do registro');
            $table
                ->timestamp(\App\Constants\Attribute::TS_ATUALIZADO)
                ->nullable()
                ->comment('Data e hora de atualização do registro');
            $table
                ->softDeletes(\App\Constants\Attribute::TS_REMOVIDO)
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
        Schema::dropIfExists(\App\Constants\Attribute::TB_PESSOA);
    }
}
