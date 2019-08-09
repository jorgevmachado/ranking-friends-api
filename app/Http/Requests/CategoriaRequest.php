<?php

namespace App\Http\Requests;

use App\Constants\Attribute;

class CategoriaRequest extends Request
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
            Attribute::NO_CATEGORIA => Attribute::REQUIRED,
            Attribute::DS_CATEGORIA   => '',
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
            Attribute::NO_CATEGORIA => 'Nome da categoria',
            Attribute::DS_CATEGORIA => 'Descrição da categoria',
        ];
    }
}
