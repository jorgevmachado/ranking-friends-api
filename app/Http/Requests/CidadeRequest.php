<?php

namespace App\Http\Requests;

use App\Constants\Attribute;

class CidadeRequest extends Request
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
            'no_cidade' => Attribute::REQUIRED,
            'cd_estado'   => Attribute::REQUIRED,
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
            'no_cidade' => 'Nome da cidade',
            'cd_estado'   => 'Código de relascionamento com o estado',
        ];
    }
}
