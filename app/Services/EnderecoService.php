<?php


namespace App\Services;


use App\Models\Endereco;

class EnderecoService extends Service
{

    /**
     * EnderecoService constructor.
     * @param Endereco $model
     */
    public function __construct(Endereco $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
