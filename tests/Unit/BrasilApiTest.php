<?php

use CelsoNery\BrasilApi\BrasilApiService;
use Illuminate\Support\Facades\Http;

it('service returns json', function () {
    Http::fake([
        '*' => Http::response(['ok' => true], 200),
    ]);

    $service = new BrasilApiService;
    $result = $service->cep('00100001');

    expect($result)->toBe(['ok' => true]);
});
