<?php

namespace CelsoNery\BrasilApi\Services;

use Illuminate\Support\Facades\Http;

class CepService
{
    public function execute(string $cep)
    {
        $cep = preg_replace('/[^0-9]/', '', $cep);

        if (strlen($cep) != 8) {
            throw new \Exception('Invalid cep size!');
        }

        return Http::timeout(config('brasilapi.timeout'))
            ->get(config('brasilapi.base_url')."/cep/v1/{$cep}")
            ->throw()
            ->json();
    }
}
