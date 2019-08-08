<?php

namespace App\Http\Controllers;

use App\Services\PessoaService;

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

}
