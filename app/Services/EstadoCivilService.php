<?php


namespace App\Services;


use App\Models\EstadoCivil;

class EstadoCivilService extends Service
{

    /**
     * EstadoCivilService constructor.
     * @param EstadoCivil $model
     */
    public function __construct(EstadoCivil $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
