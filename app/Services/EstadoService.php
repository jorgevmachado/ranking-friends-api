<?php


namespace App\Services;


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
        parent::__construct();
    }
}
