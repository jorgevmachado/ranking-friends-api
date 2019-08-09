<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Constants\Attribute::TB_CATEGORIA, function (Blueprint $table) {
            $table
                ->bigIncrements(\App\Constants\Attribute::CD_CATEGORIA)
                ->comment('Código chave da tabela PK, Identity');
            $table
                ->string(\App\Constants\Attribute::NO_CATEGORIA,250)
                ->comment('Nome da categoria');
            $table
                ->string(\App\Constants\Attribute::DS_CATEGORIA,250)
                ->nullable()
                ->comment('Descrição da categoria');
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
        Schema::dropIfExists(\App\Constants\Attribute::TB_CATEGORIA);
    }
}
