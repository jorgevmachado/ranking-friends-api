<?php


namespace App\Services;


use App\Constants\Attribute;
use App\Constants\Messages;
use App\Models\Categoria;
use App\Models\Pessoa;

class CategoriaService extends Service
{

    /**
     * CategoriaService constructor.
     * @param Categoria $model
     */
    public function __construct(Categoria $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function isValidDelete($id): bool
    {
        $pessoa = Pessoa::where(Attribute::CD_CATEGORIA,  '=' , $id)->first();
        if ($pessoa) {
            throw new \InvalidArgumentException(Messages::MSG012, 422);
        }
        return parent::isValidDelete($id);
    }
}
