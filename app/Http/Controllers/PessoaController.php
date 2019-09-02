<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Http\Requests\PessoaRequest;
use App\Services\PessoaService;
use Illuminate\Http\Response;

class PessoaController extends Controller
{

    /**
     * PessoaController constructor.
     * @param PessoaService $service
     */
    public function __construct(PessoaService $service)
    {
        $this->service = $service;
    }

    public function store(PessoaRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all()),
            __(Messages::SUCCESS_CREATE),
            Response::HTTP_CREATED
        );
    }

    public function update($id, PessoaRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all(), $id),
            __(Messages::SUCCESS_UPDATE),
            Response::HTTP_CREATED
        );
    }

}
