<?php

use App\Constants\Attribute;
use App\Models\Pontuacao;
use Illuminate\Database\Seeder;

class PontuacaoSeeder extends Seeder
{

    /** @var Pontuacao $model */
    public $model;

    /**
     * PontuacaoSeeder constructor.
     * @param Pontuacao $model
     */
    public function __construct(Pontuacao $model)
    {
        $this->model = $model;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $data = [
            [
                'nr_pontuacao' => 1,
                'ds_pontuacao' => 'Odeio',
                Attribute::TS_CRIADO => new \DateTime(),
            ],

            [
                'nr_pontuacao' => 2,
                'ds_pontuacao' => 'Não Gosto',
                Attribute::TS_CRIADO => new \DateTime(),
            ],

            [
                'nr_pontuacao' => 3,
                'ds_pontuacao' => 'Não gosto e nem desgosto',
                Attribute::TS_CRIADO => new \DateTime(),
            ],

            [
                'nr_pontuacao' => 4,
                'ds_pontuacao' => 'Gosto',
                Attribute::TS_CRIADO => new \DateTime(),
            ],

            [
                'nr_pontuacao' => 5,
                'ds_pontuacao' => 'Amo',
                Attribute::TS_CRIADO => new \DateTime(),
            ],


        ];
        $this->model->insert($data);
    }
}
