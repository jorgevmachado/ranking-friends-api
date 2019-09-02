<?php


namespace App\Services;


use App\Constants\Attribute;
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
        $this->queryBuilder = $this->model->with([
            Attribute::CATEGORIA,
            Attribute::ESTADO_CIVIL,
            Attribute::PONTUACAO,
            Attribute::ENDERECO,
            Attribute::CONTATO,
        ]);
        parent::__construct();
    }
}
