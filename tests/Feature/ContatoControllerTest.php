<?php

namespace Tests\Feature\Http\Controller;

use Tests\Feature\TestCase;

class ContatoControllerTest extends TestCase
{
    public function testGetContato()
    {
        $response = $this->get('/api/contato');
        $response->assertStatus(200);
    }

    public function testPaginateContatoFilterEmpty()
    {
        $payload = [
            'filter' => [],
            'order'  => []
        ];
        $response = $this->get(
            'api/contato?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testPaginateContatoFilter()
    {
        $payload = [
            'filter' => [
                'cd_contato' => 7,
                'ic_contato' => 'RESIDENCIAL',
                'nr_ddd' => '61',
                'nr_telefone' => '999999999',
                'ed_email' => 'mail@mail.com',
                'cd_pessoa' => 1,
                'no_nome' => 'Pessoa 1',
                'no_sobrenome' => 'Um',
                'dt_nascimento' => '1991-01-01',
                'ic_sexo' => 'F',
                'cd_estado_civil' => 1,
                'cd_pontuacao' => 1,
                'cd_categoria' => 1,
            ],
            'order'  => [
                'cd_contato' => 'DESC'
            ]
        ];
        $response = $this->get(
            'api/contato?page=1&filter='.
            json_encode($payload['filter']).
            '&order='.
            json_encode($payload['order'])
        );
        $response->assertStatus(200);
    }

    public function testShowContato()
    {
        $response = $this->get('/api/contato/1');
        $response->assertStatus(200);
    }

    public function testPostContatoErrorDDDObrigatorio()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'RESIDENCIAL',
                'cd_pessoa' => 1,
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'DDD é obrigatorio.',
            'code' => 422
        ]);
    }

    public function testPostContatoErrorDDD3Digitos()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'RESIDENCIAL',
                'cd_pessoa' => 1,
                'nr_ddd' => '61',
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'DDD Deve ser de 3 digitos.',
            'code' => 422
        ]);
    }

    public function testPostContatoErrorNumeroTelefoneObrigatorio()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'RESIDENCIAL',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Número de telefone é obrigatorio.',
            'code' => 422
        ]);
    }

    public function testPostContatoTipoTelefoneResidencial()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'RESIDENCIAL',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
                'nr_telefone' => '33333333',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPostContatoTipoTelefoneComercial()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'COMERCIAL',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
                'nr_telefone' => '33333333',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPostErrorContatoTipoTelefoneCelularNumeroInvalido()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'CELULAR',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
                'nr_telefone' => '33333333',
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'O número de telefone deve ter 9 digitos.',
            'code' => 422
        ]);
    }

    public function testPostErrorContatoTipoTelefoneResidencialNumeroInvalido()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'RESIDENCIAL',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
                'nr_telefone' => '999999999',
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'O número de telefone deve ter 8 digitos.',
            'code' => 422
        ]);
    }

    public function testPostErrorContatoTipoTelefoneResidencialEmailInvalidoParaTipoSelecionado()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'CELULAR',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
                'nr_telefone' => '999999999',
                'ed_email' => 'maria@maria.com'
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'O e-mail não é valido para o tipo selecionado.',
            'code' => 422
        ]);
    }

    public function testPostContatoTipoTelefoneCelular()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'CELULAR',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
                'nr_telefone' => '999999999',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPostErrorContatoTipoEmailObrigatorio()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'EMAIL',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
                'nr_telefone' => '999999999',
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Endereço de E-mail é obrigatorio.',
            'code' => 422
        ]);
    }

    public function testPostContatoTipoInvalid()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'TESTE',
                'cd_pessoa' => 1,
                'ed_email' => 'maria@maria.com'
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Tipo de contato não valido.',
            'code' => 422
        ]);
    }

    public function testPostContatoTipoEmailDDDInvalidoParaTipoSelecionado()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'EMAIL',
                'cd_pessoa' => 1,
                'ed_email' => 'maria@maria.com',
                'nr_ddd' => '061',
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'O DDD não é valido para o tipo selecionado.',
            'code' => 422
        ]);
    }

    public function testPostContatoTipoEmailNumeroTelefoneInvalidoParaTipoSelecionado()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'EMAIL',
                'cd_pessoa' => 1,
                'ed_email' => 'maria@maria.com',
                'nr_telefone' => '999999999',
            ]
        );
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'O Número de telefone não é valido para o tipo selecionado.',
            'code' => 422
        ]);
    }

    public function testPostContatoTipoEmail()
    {
        $response = $this->post(
            '/api/contato',
            [
                'ic_contato' => 'EMAIL',
                'cd_pessoa' => 1,
                'ed_email' => 'maria@maria.com'
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Criado com sucesso.',
        ]);
    }

    public function testPutContato()
    {
        $response = $this->put(
            '/api/contato/1',
            [
                'ic_contato' => 'EMAIL',
                'cd_pessoa' => 1,
                'ed_email' => 'maria@maria.com'
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function testPutContatoEmailParaCelular()
    {
        $response = $this->put(
            '/api/contato/4',
            [
                'ic_contato' => 'CELULAR',
                'cd_pessoa' => 1,
                'nr_ddd' => '061',
                'nr_telefone' => '999999999',
            ]
        );
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function testDeleteContato()
    {
        $response = $this->delete('/api/contato/1');
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Excluído com sucesso.',
        ]);
    }
}
