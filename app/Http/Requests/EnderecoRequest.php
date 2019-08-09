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
            Attribute::NR_CEP    => Attribute::REQUIRED,
            Attribute::NO_BAIRRO => Attribute::REQUIRED,
            Attribute::NO_RUA    => Attribute::REQUIRED,
            Attribute::NR_NUMERO => Attribute::REQUIRED,
            Attribute::CD_CIDADE => Attribute::REQUIRED,
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
            Attribute::NR_CEP    => 'Código de endereçamento postal',
            Attribute::NO_BAIRRO => 'Nome do Bairro',
            Attribute::NO_RUA    => 'Nome da Rua',
            Attribute::NR_NUMERO => 'Número',
            Attribute::CD_CIDADE => 'Código de relascionamento com a cídade',
            Attribute::CD_PESSOA => 'Código de relascionamento com a pessoa',
        ];
    }
}
