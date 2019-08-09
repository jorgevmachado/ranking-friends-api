<?php

namespace App\Traits;

use App\Constants\Attribute;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

trait ResponseTrait
{
    /**
     * Retorna uma nova resposta JSON da aplicação.
     *
     * @param mixed  $result
     * @param string $successMessage
     * @param int    $status                 Status code
     * @param bool   $sendWithArrayStructure true to makeResponseArray
     * @param string $resultCallableMethod   method name to $result execute
     *
     * @return JsonResponse
     */
    public function sendResponse(
        $result,
        $successMessage = '',
        $status = Response::HTTP_OK,
        $sendWithArrayStructure = true,
        $resultCallableMethod = ''
    ) {
        if ($result instanceof Exception) {
            $body = $this->makeResponseArray(false, '', $result->getMessage(), $result->getCode());
            $code = $result->getCode() > 511 ? 500 : $result->getCode();
            return response()->json($body, $code);
        }

        $result = !empty($resultCallableMethod) ? $result->{$resultCallableMethod}() : $result;

        $body = ($sendWithArrayStructure && !($result instanceof LengthAwarePaginator)) ?
            $this->makeResponseArray(true, $result, $successMessage) : $result;

        return response()->json($body, $status);
    }

    /**
     * Transforma em um array a ser usado em uma resposta JSON
     *
     * @param bool   $success
     * @param array  $data
     * @param string $message
     * @param string $code
     *
     * @return array
     */
    public function makeResponseArray($success = true, $data = [], $message = '', $code = '')
    {
        $response = [
            Attribute::SUCCESS => $success,
            Attribute::MESSAGE => $message,
        ];

        if (!empty($data)) {
            $response[Attribute::DATA] = $data;
        }

        if (!empty($code)) {
            $response[Attribute::CODE] = $code;
        }

        return $response;
    }
}
