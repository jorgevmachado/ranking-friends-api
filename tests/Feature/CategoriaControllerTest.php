<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class PontuacaoControllerTest extends TestCase
{
    public function testGetPontuacao()
    {
        $response = $this->get('/api/pontuacao');
        $response->assertStatus(200);
    }
    public function testPaginatePontuacaoFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/pontuacao?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }
    public function testPaginatePontuacaoFilter()
    {
        $payload = [
            'filter' => [
                'cd_pontuacao' => 1,
                'nr_pontuacao' => 2,
                'ds_pontuacao' => 'Não gosto',
            ],
            'order'  => [
                'cd_pontuacao' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/pontuacao?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowPontuacao()
    {
        $response = $this->get('/api/pontuacao/1');
        $response->assertStatus(200);
    }

    public function testPostPontuacao()
    {
        $response = $this->post(
            '/api/pontuacao',
            [
                'nr_pontuacao' => 2,
                'ds_pontuacao' => 'Pontuação que eu quero',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPutPontuacao()
    {
        $response = $this->put(
            '/api/pontuacao/1',
            [
                'nr_pontuacao' => 2,
                'ds_pontuacao' => 'Pontuação que eu quero',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function testDeletePontuacao()
    {
        $response = $this->delete('/api/pontuacao/1');
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Excluído com sucesso.',
        ]);
    }
}
