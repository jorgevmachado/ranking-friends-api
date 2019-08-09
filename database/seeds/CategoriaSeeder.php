<?php

use App\Constants\Attribute;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /** @var Categoria $model */
    public $model;

    /**
     * CategoriaSeeder constructor.
     * @param Categoria $model
     */
    public function __construct(Categoria $model)
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
              Attribute::NO_CATEGORIA => 'Amigos',
              Attribute::DS_CATEGORIA => 'Amigos que conheci na vida.',
              Attribute::TS_CRIADO => new \DateTime(),
          ],
          [
              Attribute::NO_CATEGORIA => 'Familiares',
              Attribute::DS_CATEGORIA => 'Meus Familiares.',
              Attribute::TS_CRIADO => new \DateTime(),
          ],
          [
              Attribute::NO_CATEGORIA => 'Colegas de Trabalho',
              Attribute::DS_CATEGORIA => 'Colegas que conheci no trabalho.',
              Attribute::TS_CRIADO => new \DateTime(),
          ],
          [
              Attribute::NO_CATEGORIA => 'Colegas de Faculdade',
              Attribute::DS_CATEGORIA => 'Colegas que conheci na faculdade.',
              Attribute::TS_CRIADO => new \DateTime(),
          ],
          [
              Attribute::NO_CATEGORIA => 'Colegas de Escola',
              Attribute::DS_CATEGORIA => 'Colegas que conheci na escola.',
               Attribute::TS_CRIADO => new \DateTime(),
          ],
        ];
        $this->model->insert($data);
    }
}
