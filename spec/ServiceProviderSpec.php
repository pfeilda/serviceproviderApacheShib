<?php
namespace spec\DanielPfeil\ServiceProviderApacheShib;

use DanielPfeil\ServiceProviderApacheShib\ServiceProvider;
use PhpSpec\ObjectBehavior;

//todo add checks for null
final class ServiceProviderSpec extends ObjectBehavior
{
    private $specPrefix = "AJP_";
    private $specShibPrefix = "Shib-";
    private $vars = null;

    final public function it_construct(): void
    {
        $this->setEnvVariables();

        $this->shouldBeAnInstanceOf(ServiceProvider::class);
        $this->shouldBeAnInstanceOf(\DanielPfeil\ServiceProviderAuthenticator\ServiceProvider::class);
    }

    final public function it_GetApplicationID(): void
    {
        $this->setEnvVariables();

        $this->getApplicationID()->shouldBeEqualTo($this->vars["Application-ID"]);
    }

    final public function it_getApplicationID_none_existing(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Application-ID")]);

        $this->getApplicationID()->shouldBeNull();
    }

    final public function it_getApplicationID_nothing_is_set()
    {
        $this->getApplicationID()->shouldBeNull();
    }

    final public function it_GetSessionId(): void
    {
        $this->setEnvVariables();

        $this->getSessionId()->shouldBeEqualTo($this->vars["Session-ID"]);
    }

    final public function it_GetSessionId_none_existing(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Session-ID")]);

        $this->getSessionId()->shouldBeNull();
    }

    final public function it_getSessionID_nothing_is_set()
    {
        $this->getSessionId()->shouldBeNull();
    }

    final public function it_GetIdentityProvider(): void
    {
        $this->setEnvVariables();

        $this->getIdentityProvider()->shouldBeEqualTo($this->vars["Identity-Provider"]);
    }

    final public function it_GetIdentityProvider_none_existing(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Identity-Provider")]);

        $this->getIdentityProvider()->shouldBeNull();
    }

    final public function it_GetIdentityProvider_nothing_is_set()
    {
        $this->getIdentityProvider()->shouldBeNull();
    }

    final public function it_GetAuthenticationInstant(): void
    {
        $this->setEnvVariables();

        $this->getAuthenticationInstant()->shouldBeEqualTo($this->vars["Authentication-Instant"]);
    }

    final public function it_GetAuthenticationInstant_none_existing(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Authentication-Instant")]);

        $this->getAuthenticationInstant()->shouldBeNull();
    }

    final public function it_GetAuthenticationInstant_nothing_is_set()
    {
        $this->getAuthenticationInstant()->shouldBeNull();
    }

    final public function it_GetAuthenticationMethod(): void
    {
        $this->setEnvVariables();

        $this->getAuthenticationMethod()->shouldBeEqualTo($this->vars["Authentication-Method"]);
    }

    final public function it_GetAuthenticationMethod_none_existing(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Authentication-Method")]);

        $this->getAuthenticationMethod()->shouldBeNull();
    }

    final public function it_GetAuthenticationMethod_nothing_is_set()
    {
        $this->getAuthenticationMethod()->shouldBeNull();
    }

    final public function it_GetAuthenticationContextClass(): void
    {
        $this->setEnvVariables();

        $this->getAuthenticationContextClass()->shouldBeEqualTo($this->vars["AuthnContext-Class"]);
    }


    final public function it_GetAuthenticationContextClass_none_existing(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("AuthnContext-Class")]);

        $this->getAuthenticationContextClass()->shouldBeNull();
    }

    final public function it_GetAuthenticationContextClass_nothing_is_set()
    {
        $this->getAuthenticationContextClass()->shouldBeNull();
    }

    final public function it_getSessionIndex(): void
    {
        $this->setEnvVariables();

        $this->getSessionIndex()->shouldBeEqualTo($this->vars["Session-Index"]);
    }

    final public function it_getSessionIndex_none_existing(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Session-Index")]);

        $this->getSessionIndex()->shouldBeNull();
    }

    final public function it_getSessionIndex_nothing_is_set()
    {
        $this->getApplicationID()->shouldBeNull();
    }

    final public function it_GetCookieName(): void
    {
        $this->setEnvVariables();

        $this->getCookieName()->shouldBeEqualTo($this->vars["Cookie-Name"]);
    }

    final public function it_GetCookieName_none_existing(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Cookie-Name")]);

        $this->getCookieName()->shouldBeNull();
    }

    final public function it_GetCookieName_nothing_is_set()
    {
        $this->getCookieName()->shouldBeNull();
    }

    final public function it_isSessionExisting(): void
    {
        $this->setEnvVariables();

        $this->isSessionExisting()->shouldBeBoolean();
        $this->isSessionExisting()->shouldBeEqualTo(true);
    }

    final public function it_isSessionExisting_sessionIndex_is_not_set(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Session-Index")]);

        $this->isSessionExisting()->shouldBeBoolean();
        $this->isSessionExisting()->shouldBeEqualTo(false);
    }

    final public function it_isSessionExisting_sessionId_is_not_set(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Session-ID")]);

        $this->isSessionExisting()->shouldBeBoolean();
        $this->isSessionExisting()->shouldBeEqualTo(false);
    }

    final public function it_isSessionExisting_sessionId_and_sessionIndex_is_not_set(): void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefixSpec("Session-ID")]);
        unset($_SERVER[$this->getFullPrefixSpec("Session-Index")]);

        $this->isSessionExisting()->shouldBeBoolean();
        $this->isSessionExisting()->shouldBeEqualTo(false);
    }

    final public function it_isSessionExisting_nothing_is_set(): void
    {
        $this->isSessionExisting()->shouldBeBoolean();
        $this->isSessionExisting()->shouldBeEqualTo(false);
    }

    final public function it_GetPrefix(): void
    {
        $this->setEnvVariables();

        //todo difference between shouldBe and shouldBeEqualTo
        $this->getPrefix()->shouldBeEqualTo($this->specPrefix);
    }

    final public function it_getField(): void
    {
        $this->setEnvVariables();

        $this->getField("testKey")->shouldBeEqualTo("testValue");
    }

    final public function it_getShortPrefixedValue(): void
    {
        $this->setEnvVariables();

        $this->getPrefixedField("prefixedTestKey")->shouldBeEqualTo("prefixedTestValue");
    }

    final public function it_getFullPrefixedValue(): void
    {
        $this->setEnvVariables();

        $this->getPrefixedField("prefixedTestKey", false)
            ->shouldBeEqualTo("prefixedTestValue");
    }

    final private function getFullPrefixSpec(string $string): string
    {
        return $this->specPrefix . $this->specShibPrefix . $string;
    }

    final private function setEnvVariables(): void
    {
        $this->beConstructedWith($this->specPrefix);

        $this->vars = array(
            "Application-ID" => "default",
            "Session-ID" => "_testSessionId18234",
            "Identity-Provider" => "https://idp.dev/idp/shibboleth",
            "Authentication-Instant" => "2018-01-18T00:54:21.960Z",
            "Authentication-Method" => "urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport",
            "AuthnContext-Class" => "urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport",
            "Session-Index" => "sessionIndex12",
            "Cookie-Name" => "TestCookieName89841",
            "prefixedTestKey" => "prefixedTestValue",
        );

        foreach ($this->vars as $key => $var) {
            $_SERVER[$this->getFullPrefixSpec($key)] = $var;
        }

        $_SERVER["testKey"] = "testValue";
        $_SERVER[$this->specPrefix . "prefixedTestKey"] = "prefixedTestValue";
    }
}
