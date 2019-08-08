<?php


namespace App\Services;


use App\Models\Cidade;

class CidadeService extends Service
{

    /**
     * CidadeService constructor.
     * @param Cidade $model
     */
    public function __construct(Cidade $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
