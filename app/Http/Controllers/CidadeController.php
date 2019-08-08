<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Http\Requests\CidadeRequest;
use App\Services\CidadeService;
use Illuminate\Http\Response;

class CidadeController extends Controller
{

    /**
     * CidadeController constructor.
     * @param CidadeService $service
     */
    public function __construct(CidadeService $service)
    {
        $this->service = $service;
    }

    public function store(CidadeRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all()),
            __(Messages::SUCCESS_CREATE),
            Response::HTTP_CREATED
        );
    }

    public function update($id, CidadeRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all(), $id),
            __(Messages::SUCCESS_UPDATE),
            Response::HTTP_CREATED
        );
    }
}
