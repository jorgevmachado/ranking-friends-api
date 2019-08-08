<?php

use App\Constants\Attribute;
use App\Models\Pais;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /** @var Pais $model */
    public $model;

    /**
     * PaisSeeder constructor.
     * @param Pais $model
     */
    public function __construct(Pais $model)
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
                'no_pais'                   => 'Brasil',
                'sg_pais'                   => 'BR',
                'no_continente'             => 'América',
                Attribute::TS_CRIADO        => new \DateTime(),
            ]
        ];

        $this->model->insert($data);
    }
}
