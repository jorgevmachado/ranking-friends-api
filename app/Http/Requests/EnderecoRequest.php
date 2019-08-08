<?php

namespace App\Http\Requests;

use App\Constants\Attribute;

class EnderecoRequest extends Request
{
    /**
     * Determine se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nr_cep' => Attribute::REQUIRED,
            'no_bairro' => Attribute::REQUIRED,
            'no_rua' => Attribute::REQUIRED,
            'nr_numero' => Attribute::REQUIRED,
            'cd_cidade' => Attribute::REQUIRED,
            'cd_pessoa'   => Attribute::REQUIRED,
        ];
    }

    /**
     * Obtenha atributos personalizados para erros do validador.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nr_cep' => 'Código de endereçamento postal',
            'no_bairro' => 'Nome do Bairro',
            'no_rua' => 'Nome da Rua',
            'nr_numero' => 'Número',
            'cd_cidade' => 'Código de relascionamento com a cídade',
            'cd_pessoa'   => 'Código de relascionamento com a pessoa',
        ];
    }
}
