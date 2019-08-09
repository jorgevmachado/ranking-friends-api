<?php

namespace App\Http\Requests;

use App\Constants\Attribute;

class ContatoRequest extends Request
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
            Attribute::IC_CONTATO => Attribute::REQUIRED,
            Attribute::CD_PESSOA => Attribute::REQUIRED,
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
            Attribute::IC_CONTATO => 'Tipo de contato',
            Attribute::CD_PESSOA  => 'Código de relascionamento com a pessoa',
        ];
    }
}
