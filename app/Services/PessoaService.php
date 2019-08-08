<?php


namespace App\Services;


use App\Models\Pessoa;

class PessoaService extends Service
{

    /**
     * PessoaService constructor.
     * @param Pessoa $model
     */
    public function __construct(Pessoa $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
