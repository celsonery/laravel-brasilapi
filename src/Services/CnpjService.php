<?php

namespace CelsoNery\BrasilApi\Services;

use CelsoNery\BrasilApi\Traits\ValidateCnpj;
use Illuminate\Support\Facades\Http;

class CnpjService
{
    use ValidateCnpj;

    public function execute(string $cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        if (! $this->cnpjValid($cnpj)) {
            throw new \Exception('Invalid cnpj number!');
        }

        return Http::timeout(config('brasilapi.timeout'))
            ->get(config('brasilapi.base_url')."/cnpj/v1/{$cnpj}")
            ->throw()
            ->json();
    }
}
