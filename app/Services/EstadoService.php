<?php


namespace App\Services;


use App\Constants\Attribute;
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
        $this->queryBuilder = $this->model->with(Attribute::PAIS);
        parent::__construct();
    }

    public function getPaginate($data)
    {
        $filter = $this->getFilter($data);
        $this->queryBuilder->whereHas(
            Attribute::PAIS,
            function ($qb) use ($filter) {
                    $this->filter(Attribute::NO_PAIS, $qb, $filter);
                    $this->filter(Attribute::NO_CONTINENTE, $qb, $filter);
                    $this->filter(Attribute::SG_PAIS, $qb, $filter);
            }
        );
        $data[Attribute::FILTER] = $this->setFilter($filter);
        return parent::getPaginate($data);
    }
}
