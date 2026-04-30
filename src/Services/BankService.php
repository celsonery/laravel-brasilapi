<?php

namespace CelsoNery\BrasilApi\Services;

use Illuminate\Support\Facades\Http;

class BankService
{
    public function execute()
    {
        return Http::timeout(config('brasilapi.timeout'))
            ->get(config('brasilapi.base_url').'/banks/v1')
            ->throw()
            ->json();
    }
}
