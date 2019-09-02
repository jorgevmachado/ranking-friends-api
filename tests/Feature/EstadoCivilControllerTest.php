<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class EstadoCivilControllerTest extends TestCase
{
    public function testGetEstadoCivil()
    {
        $response = $this->get('/api/estado-civil');
        $response->assertStatus(200);
    }
    public function testPaginateEstadoCivilFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/estado-civil?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }
    public function testPaginateEstadoCivilFilter()
    {
        $payload = [
            'filter' => [
                'cd_estado_civil' => 1,
                'no_estado_civil' => 'CASADO',
            ],
            'order'  => [
                'cd_estado_civil' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/estado-civil?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowEstadoCivil()
    {
        $response = $this->get('/api/estado-civil/1');
        $response->assertStatus(200);
    }
}
