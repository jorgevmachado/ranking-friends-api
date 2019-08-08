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
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table
                ->bigIncrements('cd_endereco')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string('nr_cep',11)
                ->comment('Número do cep do endereço');
            $table
                ->string('no_bairro',250)
                ->comment('Nome do bairro');
            $table
                ->string('no_rua',250)
                ->comment('Nome da rua');
            $table
                ->string('nr_numero',250)
                ->comment('Número do endereço');
            $table
                ->string('ds_complemento',250)
                ->nullable()
                ->comment('Descrição de complemento do endereço');
            $table
                ->string('ds_referencia',250)
                ->nullable()
                ->comment('Descrição de ponto de referencia');
            $table
                ->unsignedInteger('cd_cidade')
                ->comment('Código chave estrangeira FK da tabela tb_cidade');
            $table
                ->foreign('cd_cidade')
                ->references('cd_cidade')
                ->on('tb_cidade')
                ->onDelete('cascade');
            $table
                ->unsignedInteger('cd_pessoa')
                ->comment('Código chave estrangeira FK da tabela tb_pessoa');
            $table
                ->foreign('cd_pessoa')
                ->references('cd_pessoa')
                ->on('tb_pessoa')
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
        Schema::dropIfExists('tb_endereco');
    }
}
