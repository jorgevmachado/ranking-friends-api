<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Constants\Attribute::TB_ENDERECO, function (Blueprint $table) {
            $table
                ->bigIncrements(\App\Constants\Attribute::CD_ENDERECO)
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string(\App\Constants\Attribute::NR_CEP,11)
                ->comment('Número do cep do endereço');
            $table
                ->string(\App\Constants\Attribute::NO_BAIRRO,250)
                ->comment('Nome do bairro');
            $table
                ->string(\App\Constants\Attribute::NO_RUA,250)
                ->comment('Nome da rua');
            $table
                ->string(\App\Constants\Attribute::NR_NUMERO,250)
                ->comment('Número do endereço');
            $table
                ->string(\App\Constants\Attribute::DS_COMPLEMENTO,250)
                ->nullable()
                ->comment('Descrição de complemento do endereço');
            $table
                ->string(\App\Constants\Attribute::DS_REFERENCIA,250)
                ->nullable()
                ->comment('Descrição de ponto de referencia');
            $table
                ->unsignedInteger(\App\Constants\Attribute::CD_CIDADE)
                ->comment('Código chave estrangeira FK da tabela tb_cidade');
            $table
                ->foreign(\App\Constants\Attribute::CD_CIDADE)
                ->references(\App\Constants\Attribute::CD_CIDADE)
                ->on(\App\Constants\Attribute::TB_CIDADE)
                ->onDelete(\App\Constants\Attribute::CASCADE);
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
        Schema::dropIfExists(\App\Constants\Attribute::TB_ENDERECO);
    }
}
