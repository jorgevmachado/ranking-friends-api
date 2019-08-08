<?php

namespace App\Http\Requests;

use App\Constants\Attribute;

class PontuacaoRequest extends Request
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
            'nr_pontuacao' => Attribute::REQUIRED,
            'ds_pontuacao' => Attribute::REQUIRED,
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
            'nr_pontuacao' => 'Número da pontuação',
            'ds_pontuacao' => 'Descrição da pontuação',
        ];
    }
}
