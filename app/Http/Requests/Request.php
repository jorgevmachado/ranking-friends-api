<?php

namespace App\Http\Requests;

use App\Constants\Messages;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class Request extends FormRequest
{
    /**
     * Lidar com uma tentativa de validação com falha.
     *
     * @param Validator $validator
     *
     * @return void
     *
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(
                [
                    'status'      => false,
                    'message'     => Messages::VERIFIQUE_INFORMACOES,
                    'status_code' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                    'errors'      => $errors
                ],
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
