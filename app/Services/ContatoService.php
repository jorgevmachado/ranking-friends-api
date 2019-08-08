<?php


namespace App\Services;


use App\Models\Contato;

class ContatoService extends Service
{

    /**
     * ContatoService constructor.
     * @param Contato $model
     */
    public function __construct(Contato $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
