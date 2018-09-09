<?php

namespace DanielPfeil\ServiceProviderApacheShib;

//todo maybe checks for if  the getter gets valid informations
class ServiceProvider implements \DanielPfeil\ServiceProviderAuthenticator\ServiceProvider
{
    private $prefix;
    private $shibPrefix = "Shib-";

    public function __construct(string $prefix = null)
    {
        $this->prefix = $prefix;
    }

    final public function getApplicationID(): ?string
    {
        if ($this->isExisting($this->getPrefix() . $this->shibPrefix . "Application-ID")) {
            return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Application-ID"];
        }
        return null;
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

    public function isSessionExisting():bool
    {
        if ($this->getSessionIndex() != null) {
            return true;
        }
        return false;
    }

    //Be carefull access on all $_SERVER fields
    public function getField(string $fieldName):?string
    {
        return $_SERVER[$fieldName];
    }

    public function getPrefixedField(string $fieldName, bool $useShortPrefix = true):?string
    {
        if ($useShortPrefix) {
            return $this->getField($this->prefix . $fieldName);
        } else {
            return $this->getField($this->prefix . $this->shibPrefix . $fieldName);
        }
    }

    final public function getPrefix(): string
    {
        return $this->prefix;
    }

    final private function isExisting(string $testString):bool
    {
        return array_key_exists($testString, $_SERVER);
    }
}
