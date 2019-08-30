<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class EnderecoControllerTest extends TestCase
{
    public function testGetEndereco()
    {
        $response = $this->get('/api/endereco');
        $response->assertStatus(200);
    }

    public function testPaginateEnderecoFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/endereco?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    // TODO Verificar a descrição da referencia (ds_referencia)
    public function testPaginateEnderecoFilter()
    {
        $payload = [
            'filter' => [
                'cd_endereco' => 1,
                'nr_cep' => '70847010',
                'no_bairro' => 'Asa Norte',
                'no_rua' => 'Quadra SQN 406',
                'nr_numero' => '304',
                'ds_referencia' => '',
                'cd_cidade' => 1,
                'cd_pessoa' => 1,
                'no_cidade' =>'Brasilia',
                'cd_estado' => 1,
                'no_estado' =>'Distrito Federal',
                'cd_pais' => 1,
                'sg_estado' => 'DF',
                'no_pais' => 'Brasil',
                'no_continente' =>'América',
                'sg_pais' => 'BR',
                'no_nome' => 'Pessoa 1',
                'no_sobrenome' => 'Um',
                'dt_nascimento' => '1991-01-01',
                'ic_sexo' => 'M',
                'cd_estado_civil' => 1,
                'cd_categoria' => 1,
                'cd_pontuacao' => 1,
            ],
            'order'  => [
                'cd_estado_civil' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/endereco?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowEndereco()
    {
        $response = $this->get('/api/endereco/1');
        $response->assertStatus(200);
    }

    // TODO Verificar requisição erro 500
    public function testPostEndereco()
    {
        $response = $this->post(
            'api/endereco',
            [
                'nr_cep' => '11222333',
                'no_bairro' => 'Guará',
                'no_rua' => 'QI 23',
                'nr_numero' => '200',
                'cd_cidade' => 1,
                'cd_pessoa' => 1,
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    // TODO Verificar requisição erro 405
    public function testPutEndereco()
    {
        $response = $this->post(
            'api/endereco/1',
            [
                'nr_cep' => '11222333',
                'no_bairro' => 'Guará',
                'no_rua' => 'QI 23',
                'nr_numero' => '200',
                'cd_cidade' => 1,
                'cd_pessoa' => 1,
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function testDeleteEndereco()
    {
        $response = $this->delete('/api/endereco/1');
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Excluído com sucesso.',
        ]);
    }
}
