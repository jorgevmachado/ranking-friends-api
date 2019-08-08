<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Http\Requests\PontuacaoRequest;
use App\Services\PontuacaoService;
use Illuminate\Http\Response;

class PontuacaoController extends Controller
{

    /**
     * PontuacaoController constructor.
     * @param PontuacaoService $service
     */
    public function __construct(PontuacaoService $service)
    {
        $this->service = $service;
    }

    public function store(PontuacaoRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all()),
            __(Messages::SUCCESS_CREATE),
            Response::HTTP_CREATED
        );
    }

    public function update($id, PontuacaoRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all(), $id),
            __(Messages::SUCCESS_UPDATE),
            Response::HTTP_CREATED
        );
    }
}
