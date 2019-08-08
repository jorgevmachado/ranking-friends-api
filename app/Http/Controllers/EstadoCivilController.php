<?php

namespace App\Http\Controllers;

use App\Services\EstadoCivilService;

class EstadoCivilController extends Controller
{

    /**
     * EstadoCivilController constructor.
     * @param EstadoCivilService $service
     */
    public function __construct(EstadoCivilService $service)
    {
        $this->service = $service;
    }
}
