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
        $fn = function($key, &$qb, &$filter) {
            if($filter->get($key)){
                $qb->where($key, $filter->get($key));
            }
        };
        $filter = $this->getFilter($data);
        $this->queryBuilder->whereHas(
            'cidade.estado.pais',
            function ($qb) use ($filter, $fn) {
                if($filter->get('no_cidade')) {
                    $fn('no_cidade', $qb, $filter);
                }
                if($filter->get('cd_estado')) {
                    $fn('cd_estado', $qb, $filter);
                }
                if($filter->get('no_estado')) {
                    $fn('no_estado', $qb, $filter);
                }
                if($filter->get('cd_pais')) {
                    $fn('cd_pais', $qb, $filter);
                }
                if($filter->get('sg_estado')) {
                    $fn('sg_estado', $qb, $filter);
                }
                if($filter->get('no_pais')) {
                    $fn('no_pais', $qb, $filter);
                }
                if($filter->get('no_continente')) {
                    $fn('no_continente', $qb, $filter);
                }
                if($filter->get('sg_pais')) {
                    $fn('sg_pais', $qb, $filter);
                }
            }
        );
        $this->queryBuilder->whereHas(
            'pessoa',
            function ($qb) use ($filter, $fn) {
                if($filter->get('no_nome')) {
                    $fn('no_nome', $qb, $filter);
                }
                if($filter->get('no_sobrenome')) {
                    $fn('no_sobrenome', $qb, $filter);
                }
                if($filter->get('dt_nascimento')) {
                    $fn('dt_nascimento', $qb, $filter);
                }
                if($filter->get('ic_sexo')) {
                    $fn('ic_sexo', $qb, $filter);
                }
                if($filter->get('cd_estado_civil')) {
                    $fn('cd_estado_civil', $qb, $filter);
                }
                if($filter->get('cd_categoria')) {
                    $fn('cd_categoria', $qb, $filter);
                }
                if($filter->get('cd_pontuacao')) {
                    $fn('cd_pontuacao', $qb, $filter);
                }
            }
        );
        $filter->forget([
            'no_cidade',
            'cd_estado',
            'no_estado',
            'cd_pais',
            'sg_estado',
            'no_pais',
            'no_continente',
            'sg_pais',
            '',
            '',
            'no_nome',
            'no_sobrenome',
            'dt_nascimento',
            'ic_sexo',
            'cd_estado_civil',
            'cd_categoria',
            'cd_pontuacao'
        ]);
        $data['filter'] = $this->setFilter($filter);
        return parent::getPaginate($data);
    }
}
