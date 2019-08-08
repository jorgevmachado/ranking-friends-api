<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Traits\ResponseTrait;

class Controller extends BaseController
{
    use AuthorizesRequests, ResponseTrait, ValidatesRequests;

    public $service;

    public function index(Request $request)
    {
        return $this->sendResponse(
            $this->service->getPaginate($request->all()),
            __(Messages::SUCCESS_LIST)
        );
    }

    public function show($id)
    {
        return $this->sendResponse(
            $this->service->find($id),
            __(Messages::SUCCESS_ITEM)
        );
    }


    public function destroy($id)
    {
        return $this->sendResponse(
            $this->service->delete($id),
            __(Messages::SUCCESS_DESTROY)
        );
    }
}
