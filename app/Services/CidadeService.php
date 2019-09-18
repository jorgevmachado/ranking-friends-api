<?php


namespace App\Services;


use App\Constants\Attribute;
use App\Constants\Messages;
use App\Models\Cidade;
use App\Models\Endereco;

class CidadeService extends Service
{

    /**
     * CidadeService constructor.
     * @param Cidade $model
     */
    public function __construct(Cidade $model)
    {
        $this->model = $model;
        $this->queryBuilder = $this->model->with(Attribute::ESTADO);
        parent::__construct();
    }

    public function getPaginate($data)
    {
        $filter = $this->getFilter($data);

        $this->queryBuilder->whereHas(
            Attribute::ESTADO_PAIS,
            function ($qb) use ($filter) {
                    $this->filter(Attribute::NO_ESTADO, $qb, $filter);
                    $this->filter(Attribute::CD_PAIS, $qb, $filter);
                    $this->filter(Attribute::SG_ESTADO, $qb, $filter);
                    $this->filter(Attribute::NO_PAIS, $qb, $filter);
                    $this->filter(Attribute::NO_CONTINENTE, $qb, $filter);
                    $this->filter(Attribute::SG_PAIS, $qb, $filter);
            }
        );
        $data[Attribute::FILTER] = $this->setFilter($filter);
        return parent::getPaginate($data);
    }

    public function isValidDelete($id): bool
    {
        $endereco = Endereco::where(Attribute::CD_CIDADE, '=', $id)->first();
        if($endereco) {
            throw new \InvalidArgumentException(Messages::MSG013, 422);
        }
        return parent::isValidDelete($id);
    }
}
