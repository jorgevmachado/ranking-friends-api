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
                Attribute::CD_PESSOA => 1,
                Attribute::ED_EMAIL => '',
                Attribute::IC_CONTATO => Attribute::CELULAR,
                Attribute::NR_DDD => '61',
                Attribute::NR_TELEFONE => '999999999',
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                Attribute::CD_PESSOA => 1,
                Attribute::ED_EMAIL => '',
                Attribute::IC_CONTATO => Attribute::COMERCIAL,
                Attribute::NR_DDD => '61',
                Attribute::NR_TELEFONE => '55555555',
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                Attribute::CD_PESSOA => 1,
                Attribute::ED_EMAIL => '',
                Attribute::IC_CONTATO => Attribute::RESIDENCIAL,
                Attribute::NR_DDD => '61',
                Attribute::NR_TELEFONE => '33333333',
                Attribute::TS_CRIADO => new \DateTime(),
            ],
            [
                Attribute::CD_PESSOA => 1,
                Attribute::ED_EMAIL => 'mail@mail.com',
                Attribute::IC_CONTATO => Attribute::EMAIL,
                Attribute::NR_DDD => '',
                Attribute::NR_TELEFONE => '',
                Attribute::TS_CRIADO => new \DateTime(),
            ],


        ];
        $this->model->insert($data);
    }
}
