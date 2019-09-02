<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class CategoriaControllerTest extends TestCase
{
    public function testGetCategoria()
    {
        $response = $this->get('api/categoria');
        $response->assertStatus(200);
    }

    public function testPaginateCategoriaFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/categoria?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testPaginateCategoriaFilter()
    {
        $payload = [
            'filter' => [
                'cd_categoria' => 1,
                'no_categoria' => 'Familiares',
                'ds_categoria' => 'Amigos',
            ],
            'order'  => [
                'cd_categoria' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/categoria?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowCategoria()
    {
        $response = $this->get('api/categoria/1');
        $response->assertStatus(200);
    }

    public function testPostCategoria()
    {
        $response = $this->post(
            'api/categoria',
            [
                'no_categoria' => 'Amigo late',
                'ds_categoria' => 'Amigo que late',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPutCategoria()
    {
        $response = $this->put(
            'api/categoria/1',
            [
                'no_categoria' => 'Amigo late',
                'ds_categoria' => 'Amigo que late',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function testDeleteCategoriaErrorCategoriaRelascionadaAPessoa()
    {
        $response = $this->delete('api/categoria/1');
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Não é possivel excluir uma categoria, relascionada a pessoa.',
            'code' => 422
        ]);
    }

    public function testDeleteCategoria()
    {
        $response = $this->delete('api/categoria/6');
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Excluído com sucesso.',
        ]);
    }
}
