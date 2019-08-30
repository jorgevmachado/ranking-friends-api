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
                Attribute::NR_CEP                 => '70847010',
                Attribute::NO_BAIRRO              => 'Asa Norte',
                Attribute::NO_RUA                 => 'Quadra SQN 406',
                Attribute::NR_NUMERO              => '304',
                Attribute::DS_COMPLEMENTO         => 'Bloco A',
                Attribute::DS_REFERENCIA          => 'shopping',
                Attribute::CD_CIDADE              => 1,
                Attribute::CD_PESSOA              => 1,
                Attribute::TS_CRIADO     => new \DateTime(),
            ]
        ];
        $this->model->insert($data);
    }
}
