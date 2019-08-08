<?php

use App\Constants\Attribute;
use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /** @var Estado $model */
    public $model;

    /**
     * EstadoSeeder constructor.
     * @param Estado $model
     */
    public function __construct(Estado $model)
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
                'no_estado'                 => 'Distrito Federal',
                'sg_estado'                 => 'DF',
                'cd_pais'                   => 1,
                Attribute::TS_CRIADO        => new \DateTime(),
            ]
        ];

        $this->model->insert($data);
    }
}
