<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Http\Requests\CategoriaRequest;
use App\Services\CategoriaService;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{

    /**
     * CategoriaController constructor.
     * @param CategoriaService $service
     */
    public function __construct(CategoriaService $service)
    {
        $this->service = $service;
    }

    public function store(CategoriaRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all()),
            __(Messages::SUCCESS_CREATE),
            Response::HTTP_CREATED
        );
    }

    public function update($id, CategoriaRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all(), $id),
            __(Messages::SUCCESS_UPDATE),
            Response::HTTP_CREATED
        );
    }
}
