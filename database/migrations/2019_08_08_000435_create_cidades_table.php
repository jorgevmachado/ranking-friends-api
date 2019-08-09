<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Constants\Attribute::TB_CIDADE, function (Blueprint $table) {
            $table
                ->bigIncrements(\App\Constants\Attribute::CD_CIDADE)
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string(\App\Constants\Attribute::NO_CIDADE,250)
                ->comment('Nome da cidade');
            $table
                ->unsignedInteger(\App\Constants\Attribute::CD_ESTADO)
                ->comment('Código chave estrangeira FK da tabela tb_estado');
            $table
                ->foreign(\App\Constants\Attribute::CD_ESTADO)
                ->references(\App\Constants\Attribute::CD_ESTADO)
                ->on(\App\Constants\Attribute::TB_ESTADO)
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
        Schema::dropIfExists('tb_cidade');
    }
}
