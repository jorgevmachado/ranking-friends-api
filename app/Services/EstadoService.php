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
        $fn = function($key, &$qb, &$filter) {
            if($filter->get($key)){
                $qb->where($key, $filter->get($key));
            }
        };
        $filter = $this->getFilter($data);
        $this->queryBuilder->whereHas(
            'pais',
            function ($qb) use ($filter, $fn) {
                if($filter->get('no_pais')){
                    $fn('no_pais', $qb, $filter);
                }
                if($filter->get('no_continente')){
                    $fn('no_continente', $qb, $filter);
                }
                if($filter->get('sg_pais')){
                    $fn('sg_pais', $qb, $filter);
                }
            }
        );
        $filter->forget(['no_pais', 'no_continente', 'sg_pais']);
        $data['filter'] = $this->setFilter($filter);
        return parent::getPaginate($data);
    }
}
