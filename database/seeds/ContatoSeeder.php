<?php

use App\Constants\Attribute;
use App\Models\Contato;
use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{

    /** @var Contato $model */
    public $model;

    /**
     * ContatoSeeder constructor.
     * @param Contato $model
     */
    public function __construct(Contato $model)
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
                'cd_pessoa' => 1,
                'ed_email' => '',
                "ic_contato" => 'CELULAR',
                'nr_ddd' => '61',
                'nr_telefone' => '999999999',
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                'cd_pessoa' => 1,
                'ed_email' => '',
                "ic_contato" => 'COMERCIAL',
                'nr_ddd' => '61',
                'nr_telefone' => '55555555',
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                'cd_pessoa' => 1,
                'ed_email' => '',
                "ic_contato" => 'RESIDENCIAL',
                'nr_ddd' => '61',
                'nr_telefone' => '33333333',
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                'cd_pessoa' => 1,
                'ed_email' => 'mail@mail.com',
                "ic_contato" => 'EMAIL',
                'nr_ddd' => '',
                'nr_telefone' => '',
                Attribute::TS_CRIADO => new \DateTime(),
            ],


        ];
        $this->model->insert($data);
    }
}
