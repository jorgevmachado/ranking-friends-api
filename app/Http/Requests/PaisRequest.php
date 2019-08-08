<?php

namespace App\Http\Requests;

use App\Constants\Attribute;

class PaisRequest extends Request
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
            'no_pais' => Attribute::REQUIRED,
            'sg_pais' => Attribute::REQUIRED,
            'no_continente' => Attribute::REQUIRED,
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
            'no_pais' => 'Nome do páis',
            'sg_pais' => 'Sigla do páis',
            'no_continente' => 'Continente do páis',
        ];
    }
}
