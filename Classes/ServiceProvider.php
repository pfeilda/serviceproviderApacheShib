<?php

namespace DanielPfeil\ServiceProviderApacheShib;

//todo maybe checks for if  the getter gets valid informations
class ServiceProvider implements \DanielPfeil\ServiceProviderAuthenticator\ServiceProvider
{
    private $prefix;
    private $shibPrefix = "Shib-";

    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    final public function getApplicationID(): string
    {
        return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Application-ID"];
    }

    final public function getSessionId(): string
    {
        return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Session-ID"];
    }

    final public function getIdentityProvider(): string
    {
        return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Identity-Provider"];
    }

    //todo make Datetime
    final public function getAuthenticationInstant(): string
    {
        // TODO: Implement getAuthenticationInstant() method.
    }

    final public function getAuthenticationMethod(): string
    {
        // TODO: Implement getAuthenticationMethod() method.
    }

    final public function getAuthenticationContextClass(): string
    {
        // TODO: Implement getAuthentcationContext() method.
    }

    final public function getSessionIndex(): string
    {
        // TODO: Implement getCookieName() method.
    }

    final public function getCookieName(): string
    {
        // TODO: Implement getCookieName() method.
    }

    final public function getPrefix(): string
    {
        return $this->prefix;
    }

}