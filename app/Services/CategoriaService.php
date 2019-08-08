<?php


namespace App\Services;


use App\Models\Categoria;

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
}
