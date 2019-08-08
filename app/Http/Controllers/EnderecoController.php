<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Http\Requests\EnderecoRequest;
use App\Services\EnderecoService;
use Illuminate\Http\Response;

class EnderecoController extends Controller
{

    /**
     * EnderecoController constructor.
     * @param EnderecoService $service
     */
    public function __construct(EnderecoService $service)
    {
        $this->service = $service;
    }

    public function store(EnderecoRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all()),
            __(Messages::SUCCESS_CREATE),
            Response::HTTP_CREATED
        );
    }

    public function update($id, EnderecoRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all(), $id),
            __(Messages::SUCCESS_UPDATE),
            Response::HTTP_CREATED
        );
    }
}
