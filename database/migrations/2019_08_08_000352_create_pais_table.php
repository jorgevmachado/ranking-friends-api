<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pais', function (Blueprint $table) {
            $table
                ->bigIncrements('cd_pais')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string('no_pais',250)
                ->comment('Nome do pais');
            $table
                ->string('no_continente',250)
                ->comment('Nome do continente');
            $table
                ->string('sg_pais',3)
                ->comment('Sigla do pais');
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
        Schema::dropIfExists('tb_pais');
    }
}
