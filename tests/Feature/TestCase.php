<?php

namespace Tests\Feature;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
//    public function getAuthorization($seccional = false)
//    {
//        return [
//            'Authorization' => 'Bearer ' . env($seccional ? 'TEST_TOKEN' : 'TEST_TOKEN_ADMIN')
//        ];
//    }


    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function getPaginateStructure($dataStructure = [])
    {
        return [
            'current_page',
            'data' => $dataStructure,
            'total',
            'per_page',
            'path',
            'from',
        ];
    }

    public function post($uri, array $data = [], array $headers = [])
    {
        $headers['Accept'] = 'application/json';
        return parent::post($uri, $data, $headers);
    }

    public function put($uri, array $data = [], array $headers = [])
    {
        $headers['Accept'] = 'application/json';
        return parent::put($uri, $data, $headers);
    }
}
