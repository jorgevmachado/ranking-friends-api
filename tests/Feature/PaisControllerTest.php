<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class PaisControllerTest extends TestCase
{
    public function testPaginatePaisFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/pais?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testPaginatePaisFilter()
    {
        $payload = [
            'filter' => [
                'cd_pais' => 1,
                'no_pais' => 'Brasil',
                'sg_pais' => 'BR',
                'no_continente' => 'América',
            ],
            'order'  => [
                'cd_pais' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/pais?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowPais()
    {
        $response = $this->get('api/pais/1');
        $response->assertStatus(200);
    }

    public function testPostPais()
    {
        $response = $this->post(
            'api/pais',
            [
                'no_pais' => 'Estados Unidos',
                'sg_pais' => 'EUA',
                'no_continente' => 'América',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
           'success' => true,
           'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPutPais()
    {
        $response = $this->put(
            'api/pais/1',
            [
                'no_pais' => 'Estados Unidos',
                'sg_pais' => 'EUA',
                'no_continente' => 'América',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function testDeletePais()
    {
        $response = $this->delete('api/pais/1');
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Excluído com sucesso.',
        ]);
    }
}
