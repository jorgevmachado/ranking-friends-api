<?php

namespace App\Models;

use App\Constants\Attribute;

class Pessoa extends BaseModel
{
    protected $table = Attribute::TB_PESSOA;

    public function categoria()
    {
        return $this->hasOne(
            Categoria::class,
            Attribute::CD_CATEGORIA,
            Attribute::CD_CATEGORIA
        );
    }

    public function estadoCivil()
    {
        return $this->hasOne(
            EstadoCivil::class,
            Attribute::CD_ESTADO_CIVIL,
            Attribute::CD_ESTADO_CIVIL
        );
    }

    public function pontuacao()
    {
        return $this->hasOne(
            Pontuacao::class,
            Attribute::CD_PONTUACAO,
            Attribute::CD_PONTUACAO
        );
    }

    public function endereco()
    {
        return $this->belongsTo(
            Estado::class,
            Attribute::CD_PESSOA,
            Attribute::CD_PESSOA
        );
    }

    public function contato()
    {
        return $this->belongsTo(
            Contato::class,
            Attribute::CD_PESSOA,
            Attribute::CD_PESSOA
        );
    }

}
