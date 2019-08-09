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
                Attribute::NR_PONTUACAO => 1,
                Attribute::DS_PONTUACAO => 'Odeio',
                Attribute::TS_CRIADO => new \DateTime(),
            ],

            [
                Attribute::NR_PONTUACAO => 2,
                Attribute::DS_PONTUACAO => 'Não Gosto',
                Attribute::TS_CRIADO => new \DateTime(),
            ],

            [
                Attribute::NR_PONTUACAO => 3,
                Attribute::DS_PONTUACAO => 'Não gosto e nem desgosto',
                Attribute::TS_CRIADO => new \DateTime(),
            ],

            [
                Attribute::NR_PONTUACAO => 4,
                Attribute::DS_PONTUACAO => 'Gosto',
                Attribute::TS_CRIADO => new \DateTime(),
            ],

            [
                Attribute::NR_PONTUACAO => 5,
                Attribute::DS_PONTUACAO => 'Amo',
                Attribute::TS_CRIADO => new \DateTime(),
            ],
        ];
        $this->model->insert($data);
    }
}
