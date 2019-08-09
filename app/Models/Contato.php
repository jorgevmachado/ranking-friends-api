<?php

namespace App\Models;

use App\Constants\Attribute;

class Contato extends BaseModel
{
    protected $table = Attribute::TB_CONTATO;

    public function pessoa()
    {
        return $this->hasOne(
            Pessoa::class,
            Attribute::CD_PESSOA,
            Attribute::CD_PESSOA
        );
    }
}
