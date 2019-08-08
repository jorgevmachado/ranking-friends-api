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
        Schema::create('tb_contato', function (Blueprint $table) {
            $table
                ->bigIncrements('cd_contato')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->enum('ic_contato', [
                    'CELULAR',
                    'COMERCIAL',
                    'RESIDENCIAL',
                    'EMAIL'
                ])
                ->comment('Tipo do Contato (Comercial, Celular, Residencial ou E-Mail)');
            $table
                ->string('nr_ddd', 3)
                ->nullable()
                ->comment('Número do DDD do telefone.');
            $table
                ->string('nr_telefone', 12)
                ->nullable()
                ->comment('Número do telefone.');
            $table
                ->string('ed_email', 150)
                ->nullable()
                ->comment('Endereço de E-mail.');
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
        Schema::dropIfExists('tb_contato');
    }
}
