<?php

namespace CelsoNery\BrasilApi\Tests;

use CelsoNery\BrasilApi\Providers\BrasilApiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            BrasilApiServiceProvider::class,
        ];
    }
}
