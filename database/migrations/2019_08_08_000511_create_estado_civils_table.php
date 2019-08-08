<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoCivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_estado_civil', function (Blueprint $table) {
            $table
                ->bigIncrements('cd_estado_civil')
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string('no_estado_civil',250)
                ->comment('Nome do estado civil');
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
        Schema::dropIfExists('tb_estado_civil');
    }
}
