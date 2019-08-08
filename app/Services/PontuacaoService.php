<?php


namespace App\Services;


use App\Models\Pontuacao;

class PontuacaoService extends Service
{

    /**
     * PontuacaoService constructor.
     * @param Pontuacao $model
     */
    public function __construct(Pontuacao $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
