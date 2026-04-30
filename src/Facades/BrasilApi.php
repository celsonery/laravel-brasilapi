<?php

namespace CelsoNery\BrasilApi\Facades;

use Illuminate\Support\Facades\Facade;

class BrasilApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'brasilapi';
    }
}
