<?php

namespace App\Http\Requests;

use App\Constants\Attribute;

class PessoaRequest extends Request
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
            Attribute::NO_NOME          => Attribute::REQUIRED,
            Attribute::NO_SOBRENOME     => Attribute::REQUIRED,
            Attribute::DT_NASCIMENTO    => Attribute::REQUIRED,
            Attribute::IC_SEXO          => Attribute::REQUIRED,
            Attribute::CD_ESTADO_CIVIL  => Attribute::REQUIRED,
            Attribute::CD_CATEGORIA     => Attribute::REQUIRED,
            Attribute::CD_PONTUACAO     => Attribute::REQUIRED,
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
            Attribute::NO_NOME          => 'Nome',
            Attribute::NO_SOBRENOME     => 'Sobrenome',
            Attribute::DT_NASCIMENTO    => 'Data de Nascimento',
            Attribute::IC_SEXO          => 'Sexo',
            Attribute::CD_ESTADO_CIVIL  => 'Código de relascionamento com o estado civil',
            Attribute::CD_CATEGORIA     => 'Código de relascionamento com a categoria',
            Attribute::CD_PONTUACAO     => 'Código de relascionamento com a pontuação',
        ];
    }
}
