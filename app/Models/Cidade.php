<?php

namespace App\Models;

use App\Constants\Attribute;

class Cidade extends BaseModel
{
    protected $table = Attribute::TB_CIDADE;

    public function estado()
    {
        return $this->hasOne(
            Estado::class,
            Attribute::CD_ESTADO,
            Attribute::CD_ESTADO
        )->with(Attribute::PAIS);
    }
}
