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
            'no_categoria' => Attribute::REQUIRED,
            'ds_categoria'   => '',
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
            'no_categoria' => 'Nome da categoria',
            'ds_categoria' => 'Descrição da categoria',
        ];
    }
}
