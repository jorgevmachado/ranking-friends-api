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
              'no_categoria' => 'Amigos',
              'ds_categoria' => 'Amigos que conheci na vida.',
              Attribute::TS_CRIADO => new \DateTime(),
          ],
          [
              'no_categoria' => 'Familiares',
              'ds_categoria' => 'Meus Familiares.',
              Attribute::TS_CRIADO => new \DateTime(),
          ],
          [
              'no_categoria' => 'Colegas de Trabalho',
              'ds_categoria' => 'Colegas que conheci no trabalho.',
              Attribute::TS_CRIADO => new \DateTime(),
          ],
          [
              'no_categoria' => 'Colegas de Faculdade',
              'ds_categoria' => 'Colegas que conheci na faculdade.',
              Attribute::TS_CRIADO => new \DateTime(),
          ],
          [
              'no_categoria' => 'Colegas de Escola',
              'ds_categoria' => 'Colegas que conheci na escola.',
               Attribute::TS_CRIADO => new \DateTime(),
          ],
        ];
        $this->model->insert($data);
    }
}
