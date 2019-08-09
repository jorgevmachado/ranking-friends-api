<?php

use App\Constants\Attribute;
use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{

    /** @var Pessoa $model */
    public $model;

    /**
     * PessoaSeeder constructor.
     * @param Pessoa $model
     */
    public function __construct(Pessoa $model)
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
                Attribute::NO_NOME           => 'Pessoa 1',
                Attribute::NO_SOBRENOME      => 'Um',
                Attribute::DT_NASCIMENTO     => new DateTime('1991/01/01'),
                Attribute::IC_SEXO           => 'M',
                Attribute::CD_ESTADO_CIVIL   => 1,
                Attribute::CD_CATEGORIA      => 1,
                Attribute::CD_PONTUACAO      => 1,
                Attribute::TS_CRIADO         => new \DateTime(),
            ],
            [
                Attribute::NO_NOME           => 'Pessoa 2',
                Attribute::NO_SOBRENOME      => 'Dois',
                Attribute::DT_NASCIMENTO     => new DateTime('1992/02/02'),
                Attribute::IC_SEXO           => 'F',
                Attribute::CD_ESTADO_CIVIL   => 2,
                Attribute::CD_CATEGORIA      => 2,
                Attribute::CD_PONTUACAO      => 2,
                Attribute::TS_CRIADO         => new \DateTime(),
            ],
            [
                Attribute::NO_NOME           => 'Pessoa 3',
                Attribute::NO_SOBRENOME      => 'Três',
                Attribute::DT_NASCIMENTO     => new DateTime('1993/03/03'),
                Attribute::IC_SEXO           => 'M',
                Attribute::CD_ESTADO_CIVIL   => 3,
                Attribute::CD_CATEGORIA      => 3,
                Attribute::CD_PONTUACAO      => 3,
                Attribute::TS_CRIADO         => new \DateTime(),
            ],
            [
                Attribute::NO_NOME           => 'Pessoa 4',
                Attribute::NO_SOBRENOME      => 'Quatro',
                Attribute::DT_NASCIMENTO     => new DateTime('1994/04/04'),
                Attribute::IC_SEXO           => 'F',
                Attribute::CD_ESTADO_CIVIL   => 4,
                Attribute::CD_CATEGORIA      => 4,
                Attribute::CD_PONTUACAO      => 4,
                Attribute::TS_CRIADO         => new \DateTime(),
            ],
            [
                Attribute::NO_NOME           => 'Pessoa 5',
                Attribute::NO_SOBRENOME      => 'Cinco',
                Attribute::DT_NASCIMENTO     => new DateTime('1995/05/05'),
                Attribute::IC_SEXO           => 'M',
                Attribute::CD_ESTADO_CIVIL   => 5,
                Attribute::CD_CATEGORIA      => 5,
                Attribute::CD_PONTUACAO      => 5,
                Attribute::TS_CRIADO => new \DateTime(),
            ],

        ];
        $this->model->insert($data);
    }
}
