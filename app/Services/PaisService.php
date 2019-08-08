<?php


namespace App\Services;


use App\Models\Pais;

class PaisService extends Service
{

    /**
     * PaisService constructor.
     * @param Pais $model
     */
    public function __construct(Pais $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
