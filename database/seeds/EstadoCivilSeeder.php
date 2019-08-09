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
                Attribute::NO_ESTADO_CIVIL        => 'Solteiro(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
            [
                Attribute::NO_ESTADO_CIVIL        => 'Casado(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
            [
                Attribute::NO_ESTADO_CIVIL        => 'Divorciado(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
            [
                Attribute::NO_ESTADO_CIVIL        => 'Viúvo(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
            [
                Attribute::NO_ESTADO_CIVIL        => 'Separado(a)(a)',
                Attribute::TS_CRIADO     => new \DateTime(),
            ],
        ];

        $this->model->insert($data);
    }
}
