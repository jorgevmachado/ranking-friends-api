<?php


namespace App\Services;


use App\Constants\Attribute;
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
        $this->queryBuilder = $this->model->with(Attribute::ESTADO);
        parent::__construct();
    }
}
