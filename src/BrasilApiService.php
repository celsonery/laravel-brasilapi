<?php

namespace CelsoNery\BrasilApi;

class BrasilApiService
{
    public function __call(string $method, array $args)
    {
        $serviceClass = 'CelsoNery\\BrasilApi\\Services\\'.ucfirst($method).'Service';

        if (class_exists($serviceClass)) {
            $service = new $serviceClass;

            return count($args) > 0
                ? $service->execute(...$args)
                : $service->execute();
        }

        throw new \BadMethodCallException("Method {$method} do not found!");
    }
}
