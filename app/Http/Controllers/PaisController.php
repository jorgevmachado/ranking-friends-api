<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Http\Requests\PaisRequest;
use App\Services\PaisService;
use Illuminate\Http\Response;

class PaisController extends Controller
{

    /**
     * PaisController constructor.
     * @param PaisService $service
     */
    public function __construct(PaisService $service)
    {
        $this->service = $service;
    }

    public function store(PaisRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all()),
            __(Messages::SUCCESS_CREATE),
            Response::HTTP_CREATED
        );
    }

    public function update($id, PaisRequest $request)
    {
        return $this->sendResponse(
            $this->service->save($request->all(), $id),
            __(Messages::SUCCESS_UPDATE),
            Response::HTTP_CREATED
        );
    }
}
