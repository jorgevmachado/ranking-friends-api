<?php

namespace App\Http\Requests;

use App\Constants\Attribute;

class EstadoRequest extends Request
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
            'no_estado' => Attribute::REQUIRED,
            'sg_estado' => Attribute::REQUIRED,
            'cd_pais'   => Attribute::REQUIRED,
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
            'no_estado' => 'Nome do estado',
            'sg_estado' => 'Sigla do estado',
            'cd_pais'   => 'Código de relascionamento com o páis',
        ];
    }
}
