<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class CidadeControllerTest extends TestCase
{
    public function testGetCidade()
    {
        $response = $this->get('/api/cidade');
        $response->assertStatus(200);
    }
    public function testPaginateCidadeFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/cidade?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }
    public function testPaginateCidadeFilter()
    {
        $payload = [
            'filter' => [
                'cd_cidade' => 1,
                'no_cidade' => 'Brasilia',
                'cd_estado' => 1,
                'no_estado' => 'Distrito Federal',
                'sg_estado' => 'DF',
                'no_continente' => 'America',
                'cd_pais' => 1,
                'no_pais' => 'Brasil',
                'sg_pais' => 'BR',
            ],
            'order'  => [
                'cd_cidade' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/cidade?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowCidade()
    {
        $response = $this->get('/api/cidade/1');
        $response->assertStatus(200);
    }

    public function testPostCidade()
    {
        $response = $this->post(
            '/api/cidade',
            [
                'no_cidade' => 'Guará',
                'cd_estado' => 1,
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPutCidade()
    {
        $response = $this->put(
            '/api/cidade/1',
            [
                'no_cidade' => 'Guará',
                'cd_estado' => 1,
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function testDeleteCidade()
    {
        $response = $this->delete('/api/cidade/1');
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Excluído com sucesso.',
        ]);
    }
}
