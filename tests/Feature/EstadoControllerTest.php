<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class EstadoControllerTest extends TestCase
{
    public function testGetEstado()
    {
        $response = $this->get('/api/estado');
        $response->assertStatus(200);
    }
    public function testPaginateEstadoFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/estado?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }
    public function testPaginateEstadoFilter()
    {
        $payload = [
            'filter' => [
                'cd_estado' => 1,
                'no_estado' => 'Distrito Federal',
                'sg_estado' => 'DF',
                'cd_pais' => 1,
                'no_pais' => 'Brasil',
                'sg_pais' => 'BR',
                'no_continente' => 'America',
            ],
            'order'  => [
                'cd_estado' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/estado?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowEstado()
    {
        $response = $this->get('/api/estado/1');
        $response->assertStatus(200);
    }

    public function testPostEstado()
    {
        $response = $this->post(
            '/api/estado',
            [
                'no_estado' => 'Goias',
                'sg_estado' => 'GO',
                'cd_pais' => 1,
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPutEstado()
    {
        $response = $this->put(
            '/api/estado/1',
            [
                'no_estado' => 'Goias',
                'sg_estado' => 'GO',
                'cd_pais' => 1,
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function testDeleteEstado()
    {
        $response = $this->delete('/api/estado/1');
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Excluído com sucesso.',
        ]);
    }
}
