<?php

namespace App\Models;

use App\Constants\Attribute;

class Endereco extends BaseModel
{
    protected $table = Attribute::TB_ENDERECO;

    public function cidade()
    {
        return $this->hasOne(
            Cidade::class,
            Attribute::CD_CIDADE,
            Attribute::CD_CIDADE
        )->with(Attribute::ESTADO);
    }

    public function pessoa()
    {
        return $this->hasOne(
            Pessoa::class,
            Attribute::CD_PESSOA,
            Attribute::CD_PESSOA
        );
    }
}
