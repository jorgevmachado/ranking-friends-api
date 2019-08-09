<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Constants\Attribute::TB_CONTATO, function (Blueprint $table) {
            $table
                ->bigIncrements('cd_contato')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->enum('ic_contato', [
                    \App\Constants\Attribute::CELULAR,
                    \App\Constants\Attribute::COMERCIAL,
                    \App\Constants\Attribute::RESIDENCIAL,
                    \App\Constants\Attribute::EMAIL
                ])
                ->comment('Tipo do Contato (Comercial, Celular, Residencial ou E-Mail)');
            $table
                ->string(\App\Constants\Attribute::NR_DDD, 3)
                ->nullable()
                ->comment('Número do DDD do telefone.');
            $table
                ->string(\App\Constants\Attribute::NR_TELEFONE, 12)
                ->nullable()
                ->comment('Número do telefone.');
            $table
                ->string(\App\Constants\Attribute::ED_EMAIL, 150)
                ->nullable()
                ->comment('Endereço de E-mail.');
            $table
                ->unsignedInteger(\App\Constants\Attribute::CD_PESSOA)
                ->comment('Código chave estrangeira FK da tabela tb_pessoa');
            $table
                ->foreign(\App\Constants\Attribute::CD_PESSOA)
                ->references(\App\Constants\Attribute::CD_PESSOA)
                ->on(\App\Constants\Attribute::TB_PESSOA)
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
        Schema::dropIfExists(\App\Constants\Attribute::TB_CONTATO);
    }
}
