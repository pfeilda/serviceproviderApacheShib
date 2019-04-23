<?php

namespace DanielPfeil\ServiceProviderApacheShib;

use \DanielPfeil\ServiceProviderAuthenticator\ServiceProvider as ServiceProviderInterface;

final class Factory implements \DanielPfeil\ServiceProviderAuthenticator\Factory
{
    private static $instance = null;

    private function __construct()
    {
    }

    final public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Factory();
        }
        return self::$instance;
    }

    final public function getServiceProvider(?array $data = null): ?ServiceProviderInterface
    {
        if ($this->isDataValid($data)) {
            return new ServiceProvider($data["prefix"]);
        }
        return null;
    }

    final private function isDataValid(?array $data = null)
    {
        if (is_array($data) && isset($data["prefix"])) {
            return $this->prefixIsValidArrayKey($data);
        }
        return false;
    }

    final private function prefixIsValidArrayKey(array $data)
    {
        if (is_int($data["prefix"]) || is_string($data["prefix"])) {
            return true;
        }
        return false;
    }
}
