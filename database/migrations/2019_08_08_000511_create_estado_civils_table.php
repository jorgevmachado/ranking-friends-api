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
        Schema::create(\App\Constants\Attribute::TB_ESTADO_CIVIL, function (Blueprint $table) {
            $table
                ->bigIncrements(\App\Constants\Attribute::CD_ESTADO_CIVIL)
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string(\App\Constants\Attribute::NO_ESTADO_CIVIL,250)
                ->comment('Nome do estado civil');
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
        Schema::dropIfExists(\App\Constants\Attribute::TB_ESTADO_CIVIL);
    }
}
