<?php

use Illuminate\Support\Facades\Http;

it('it fetches cep data', function () {
    Http::fake([
        '*' => Http::response([
            'cep' => '00100001',
            'logradouro' => 'Praça Teste',
        ], 200),
    ]);

    $result = app('brasilapi')->cep('00100001');

    expect($result)
        ->toBeArray()
        ->and($result['cep'])->toBe('00100001');
});
