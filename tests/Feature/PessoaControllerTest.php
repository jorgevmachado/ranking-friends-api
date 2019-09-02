<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class PessoaControllerTest extends TestCase
{
    public function testGetPessoa()
    {
        $response = $this->get('api/pessoa');
        $response->assertStatus(200);
    }

    public function testPaginatePessoaFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/pessoa?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testPaginatePessoaFilter()
    {
        $payload = [
            'filter' => [
                'cd_pessoa' => 1,
                'no_nome' => 'Pessoa 1',
                'dt_nascimento' => '1991-01-01',
                'ic_sexo' => 'F',
                'cd_estado_civil' => 1,
                'cd_categoria' => 1,
                'cd_pontuacao' => 1,
            ],
            'order'  => [
                'cd_estado_civil' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/pessoa?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowPessoa()
    {
        $response = $this->get('api/pessoa/1');
        $response->assertStatus(200);
    }

    public function testPostPessoa()
    {
        $response = $this->post(
            'api/pessoa',
            [
                "no_nome" => "Pessoa  nome Form",
                "no_sobrenome" => "Pessoa Sobrenome Form",
                "dt_nascimento" => "1990-07-07",
                "ic_sexo" => "M",
                "cd_estado_civil" => "1",
                "cd_categoria" => "1",
                "cd_pontuacao" => "1"
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPutPessoa()
    {
        $response = $this->put(
            'api/pessoa/1',
            [
                "no_nome" => "Pessoa  nome Form",
                "no_sobrenome" => "Pessoa Sobrenome Form",
                "dt_nascimento" => "1990-07-07",
                "ic_sexo" => "M",
                "cd_estado_civil" => "1",
                "cd_categoria" => "1",
                "cd_pontuacao" => "1"
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);

    }
}
