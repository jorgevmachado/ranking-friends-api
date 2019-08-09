<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Constants\Attribute::TB_ESTADO, function (Blueprint $table) {
            $table
                ->bigIncrements(\App\Constants\Attribute::CD_ESTADO)
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string(\App\Constants\Attribute::NO_ESTADO,250)
                ->comment('Nome do estado');
            $table
                ->unsignedInteger(\App\Constants\Attribute::CD_PAIS)
                ->comment('Código chave estrangeira FK da tabela tb_pais');
            $table
                ->string(\App\Constants\Attribute::SG_ESTADO,3)
                ->comment('Sigla do estado');
            $table
                ->foreign(\App\Constants\Attribute::CD_PAIS)
                ->references(\App\Constants\Attribute::CD_PAIS)
                ->on(\App\Constants\Attribute::TB_PAIS)
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
        Schema::dropIfExists(\App\Constants\Attribute::TB_ESTADO);
    }
}
