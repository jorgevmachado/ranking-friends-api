<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Http\Requests\ContatoRequest;
use App\Services\ContatoService;
use Illuminate\Http\Response;

class ContatoController extends Controller
{
    /**
     * ContatoController constructor.
     * @param ContatoService $service
     */
    public function __construct(ContatoService $service)
    {
        $this->service = $service;
    }

    public function store(ContatoRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all()),
            __(Messages::SUCCESS_CREATE),
            Response::HTTP_CREATED
        );
    }

    public function update($id, ContatoRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all(), $id),
            __(Messages::SUCCESS_UPDATE),
            Response::HTTP_CREATED
        );
    }
}
