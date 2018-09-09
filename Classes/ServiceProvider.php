<?php

namespace DanielPfeil\ServiceProviderApacheShib;

//todo maybe checks for if  the getter gets valid informations
final class ServiceProvider implements \DanielPfeil\ServiceProviderAuthenticator\ServiceProvider
{
    private $prefix;
    private $shibPrefix = "Shib-";

    final public function __construct(string $prefix = null)
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

    final public function getSessionId(): ?string
    {
        if ($this->isExisting($this->getPrefix() . $this->shibPrefix . "Session-ID")) {
            return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Session-ID"];
        }
        return null;
    }

    final public function getIdentityProvider(): ?string
    {
        if ($this->isExisting($this->getPrefix() . $this->shibPrefix . "Identity-Provider")) {
            return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Identity-Provider"];
        }
        return null;
    }

    //todo make Datetime
    final public function getAuthenticationInstant(): ?string
    {
        if ($this->isExisting($this->getPrefix() . $this->shibPrefix . "Authentication-Instant")) {
            return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Authentication-Instant"];
        }
        return null;
    }

    final public function getAuthenticationMethod(): ?string
    {
        if ($this->isExisting($this->getPrefix() . $this->shibPrefix . "Authentication-Method")) {
            return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Authentication-Method"];
        }
        return null;
    }

    final public function getAuthenticationContextClass(): ?string
    {
        if ($this->isExisting($this->getPrefix() . $this->shibPrefix . "AuthnContext-Class")) {
            return $_SERVER[$this->getPrefix() . $this->shibPrefix . "AuthnContext-Class"];
        }
        return null;
    }

    final public function getSessionIndex(): ?string
    {
        if ($this->isExisting($this->getPrefix() . $this->shibPrefix . "Session-Index")) {
            return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Session-Index"];
        }
        return null;
    }

    final public function getCookieName(): ?string
    {
        if ($this->isExisting($this->getPrefix() . $this->shibPrefix . "Cookie-Name")) {
            return $_SERVER[$this->getPrefix() . $this->shibPrefix . "Cookie-Name"];
        }
        return null;
    }

    final public function isSessionExisting(): bool
    {
        if ($this->getSessionIndex() != null && $this->getSessionId() != null) {
            return true;
        }
        return false;
    }

    //Be carefull access on all $_SERVER fields
    final public function getField(string $fieldName): ?string
    {
        return $_SERVER[$fieldName];
    }

    final public function getPrefixedField(string $fieldName, bool $useShortPrefix = true): ?string
    {
        if ($useShortPrefix) {
            return $this->getField($this->prefix . $fieldName);
        } else {
            return $this->getField($this->prefix . $this->shibPrefix . $fieldName);
        }
    }

    final public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    final private function isExisting(string $testString):bool
    {
        return array_key_exists($testString, $_SERVER);
    }
}