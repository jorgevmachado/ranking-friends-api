<?php

use App\Constants\Attribute;
use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{

    /** @var Endereco $model */
    public $model;

    /**
     * EnderecoSeeder constructor.
     * @param Endereco $model
     */
    public function __construct(Endereco $model)
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
                'nr_cep'                 => '70847010',
                'no_bairro'              => 'Asa Norte',
                'no_rua'                 => 'Quadra SQN 406',
                'nr_numero'              => '304',
                'ds_complemento'         => 'Bloco A',
                'ds_referencia'          => '',
                'cd_cidade'              => 1,
                'cd_pessoa'              => 1,
                Attribute::TS_CRIADO     => new \DateTime(),
            ]
        ];
        $this->model->insert($data);
    }
}
