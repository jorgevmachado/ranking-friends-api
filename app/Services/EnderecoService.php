<?php


namespace App\Services;


use App\Constants\Attribute;
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
        $this->queryBuilder = $this->model->with([Attribute::CIDADE, Attribute::PESSOA]);
        parent::__construct();
    }
}
