<?php

use App\Constants\Attribute;
use App\Models\EstadoCivil;
use Illuminate\Database\Seeder;

class EstadoCivilSeeder extends Seeder
{
    /** @var EstadoCivil $model */
    public $model;

    /**
     * EstadoSeeder constructor.
     * @param EstadoCivil $model
     */
    public function __construct(EstadoCivil $model)
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
                'no_estado_civil'        => 'Solteiro(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
            [
                'no_estado_civil'        => 'Casado(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
            [
                'no_estado_civil'        => 'Divorciado(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
            [
                'no_estado_civil'        => 'Viúvo(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
            [
                'no_estado_civil'        => 'Separado(a)(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
        ];

        $this->model->insert($data);
    }
}
