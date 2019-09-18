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

    public function getPaginate($data)
    {
        $filter = $this->getFilter($data);
        $this->queryBuilder->whereHas(
            Attribute::CIDADE_ESTADO_PAIS,
            function ($qb) use ($filter) {
                    $this->filter(Attribute::NO_CIDADE, $qb, $filter);
                    $this->filter(Attribute::CD_ESTADO, $qb, $filter);
                    $this->filter(Attribute::NO_ESTADO, $qb, $filter);
                    $this->filter(Attribute::CD_PAIS, $qb, $filter);
                    $this->filter(Attribute::SG_ESTADO, $qb, $filter);
                    $this->filter(Attribute::NO_PAIS, $qb, $filter);
                    $this->filter(Attribute::NO_CONTINENTE, $qb, $filter);
                    $this->filter(Attribute::SG_PAIS, $qb, $filter);
            }
        );
        $this->queryBuilder->whereHas(
            Attribute::PESSOA,
            function ($qb) use ($filter) {
                    $this->filter(Attribute::NO_NOME, $qb, $filter);
                    $this->filter(Attribute::NO_SOBRENOME, $qb, $filter);
                    $this->filter(Attribute::DT_NASCIMENTO, $qb, $filter);
                    $this->filter(Attribute::IC_SEXO, $qb, $filter);
                    $this->filter(Attribute::IC_ESTADO_CIVIL, $qb, $filter);
                    $this->filter(Attribute::CD_CATEGORIA, $qb, $filter);
                    $this->filter(Attribute::CD_PONTUACAO, $qb, $filter);
            }
        );
        $data[Attribute::FILTER] = $this->setFilter($filter);
        return parent::getPaginate($data);
    }
}
