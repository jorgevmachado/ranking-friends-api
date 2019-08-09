<?php

namespace App\Models;

use App\Constants\Attribute;

class Estado extends BaseModel
{
    protected $table = Attribute::TB_ESTADO;

    public function pais()
    {
        return $this->hasOne(
            Pais::class,
            Attribute::CD_PAIS,
            Attribute::CD_PAIS
        );
    }
}
