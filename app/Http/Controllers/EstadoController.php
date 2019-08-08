<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Http\Requests\EstadoRequest;
use App\Services\EstadoService;
use Illuminate\Http\Response;

class EstadoController extends Controller
{

    /**
     * EstadoController constructor.
     * @param EstadoService $service
     */
    public function __construct(EstadoService $service)
    {
        $this->service = $service;
    }

    public function store(EstadoRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all()),
            __(Messages::SUCCESS_CREATE),
            Response::HTTP_CREATED
        );
    }

    public function update($id, EstadoRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all(), $id),
            __(Messages::SUCCESS_UPDATE),
            Response::HTTP_CREATED
        );
    }
}
