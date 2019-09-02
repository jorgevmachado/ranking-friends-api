<?php

use App\Constants\Attribute;
use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /** @var Cidade $model */
    public $model;

    /**
     * EstadoSeeder constructor.
     * @param Cidade $model
     */
    public function __construct(Cidade $model)
    {
        $this->model = $model;
    }


    /**
     * Run the database seeds.*
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $data = [
            [
                Attribute::NO_CIDADE        => 'Brasilia',
                Attribute::CD_ESTADO        => 1,
                Attribute::TS_CRIADO        => new \DateTime(),
            ],
            [
                Attribute::NO_CIDADE        => 'Águas Claras',
                Attribute::CD_ESTADO        => 1,
                Attribute::TS_CRIADO        => new \DateTime(),
            ]
        ];

        $this->model->insert($data);
    }
}
