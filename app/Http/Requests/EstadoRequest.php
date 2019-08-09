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
            Attribute::NO_ESTADO => Attribute::REQUIRED,
            Attribute::SG_ESTADO => Attribute::REQUIRED,
            Attribute::CD_PAIS   => Attribute::REQUIRED,
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
            Attribute::NO_ESTADO => 'Nome do estado',
            Attribute::SG_ESTADO => 'Sigla do estado',
            Attribute::CD_PAIS   => 'Código de relascionamento com o páis',
        ];
    }
}
