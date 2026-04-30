<?php

namespace CelsoNery\BrasilApi\Services;

use Illuminate\Support\Facades\Http;

class CnpjService
{
    public function execute(string $cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        if (strlen($cnpj != 14)) {
            throw new \Exception('Invalid cnpj size!');
        }

        return Http::timeout(config('brasilapi.timeout'))
            ->get(config('brasilapi.base_url')."/cnpj/v1/{$cnpj}")
            ->throw()
            ->json();
    }
}
