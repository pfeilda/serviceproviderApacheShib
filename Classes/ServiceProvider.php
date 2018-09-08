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
        return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Authentication-Instant"];
    }

    final public function getAuthenticationMethod(): string
    {
        return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Authentication-Method"];
    }

    final public function getAuthenticationContextClass(): string
    {
        return $_SERVER[$this->getPrefix() . $this->shibPrefix . "AuthnContext-Class"];
    }

    final public function getSessionIndex(): string
    {
        return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Session-Index"];
    }

    final public function getCookieName(): string
    {
        return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Cookie-Name"];
    }

    final public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function isSessionExisting():bool
    {
        // TODO: write logic here
    }

}