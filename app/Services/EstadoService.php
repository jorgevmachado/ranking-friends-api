<?php


namespace App\Services;


use App\Constants\Attribute;
use App\Models\Estado;

class EstadoService extends Service
{
    /**
     * EstadoService constructor.
     * @param Estado $model
     */
    public function __construct(Estado $model)
    {
        $this->model = $model;
        $this->queryBuilder = $this->model->with(Attribute::PAIS);
        parent::__construct();
    }
}
