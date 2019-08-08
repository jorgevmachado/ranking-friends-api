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
                'no_nome'           => 'Pessoa 1',
                'no_sobrenome'      => 'Um',
                'dt_nascimento'     => new DateTime('1991/01/01'),
                'ic_sexo'           => 'M',
                'cd_estado_civil'   => 1,
                'cd_categoria'      => 1,
                'cd_pontuacao'      => 1,
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                'no_nome'           => 'Pessoa 2',
                'no_sobrenome'      => 'Dois',
                'dt_nascimento'     => new DateTime('1992/02/02'),
                'ic_sexo'           => 'F',
                'cd_estado_civil'   => 2,
                'cd_categoria'      => 2,
                'cd_pontuacao'      => 2,
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                'no_nome'           => 'Pessoa 3',
                'no_sobrenome'      => 'Três',
                'dt_nascimento'     => new DateTime('1993/03/03'),
                'ic_sexo'           => 'M',
                'cd_estado_civil'   => 3,
                'cd_categoria'      => 3,
                'cd_pontuacao'      => 3,
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                'no_nome'           => 'Pessoa 4',
                'no_sobrenome'      => 'Quatro',
                'dt_nascimento'     => new DateTime('1994/04/04'),
                'ic_sexo'           => 'F',
                'cd_estado_civil'   => 4,
                'cd_categoria'      => 4,
                'cd_pontuacao'      => 4,
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                'no_nome'           => 'Pessoa 5',
                'no_sobrenome'      => 'Cinco',
                'dt_nascimento'     => new DateTime('1995/05/05'),
                'ic_sexo'           => 'M',
                'cd_estado_civil'   => 5,
                'cd_categoria'      => 5,
                'cd_pontuacao'      => 5,
                Attribute::TS_CRIADO => new \DateTime(),
            ],

        ];
        $this->model->insert($data);
    }
}
