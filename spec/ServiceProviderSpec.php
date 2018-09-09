<?php
namespace spec\DanielPfeil\ServiceProviderApacheShib;

use DanielPfeil\ServiceProviderApacheShib\ServiceProvider;
use PhpSpec\ObjectBehavior;

//todo add checks for null
class ServiceProviderSpec extends ObjectBehavior
{
    private $specPrefix = "AJP_";
    private $specShibPrefix = "Shib-";
    private $vars = null;

    public function it_construct():void
    {
        $this->setEnvVariables();

        $this->shouldBeAnInstanceOf(ServiceProvider::class);
        $this->shouldBeAnInstanceOf(\DanielPfeil\ServiceProviderAuthenticator\ServiceProvider::class);
    }

    public function it_GetApplicationID():void
    {
        $this->setEnvVariables();

        $this->getApplicationID()->shouldBeEqualTo($this->vars["Application-ID"]);
    }

    public function it_getApplicationID_none_existing():void
    {
        $this->setEnvVariables();

        unset($_SERVER[$this->getFullPrefix("Application-ID")]);

        $this->getApplicationID()->shouldBeNull();
    }

    public function it_getApplicationID_nothing_is_set(){
        $this->getApplicationID()->shouldBeNull();
    }

    public function it_GetSessionId():void
    {
        $this->setEnvVariables();

        $this->getSessionId()->shouldBeEqualTo($this->vars["Session-ID"]);
    }

    public function it_GetIdentityProvider():void
    {
        $this->setEnvVariables();

        $this->getIdentityProvider()->shouldBeEqualTo($this->vars["Identity-Provider"]);
    }

    public function it_GetAuthenticationInstant():void
    {
        $this->setEnvVariables();

        $this->getAuthenticationInstant()->shouldBeEqualTo($this->vars["Authentication-Instant"]);
    }

    public function it_GetAuthenticationMethod():void
    {
        $this->setEnvVariables();

        $this->getAuthenticationMethod()->shouldBeEqualTo($this->vars["Authentication-Method"]);
    }

    public function it_GetAuthenticationContextClass():void
    {
        $this->setEnvVariables();

        $this->getAuthenticationContextClass()->shouldBeEqualTo($this->vars["AuthnContext-Class"]);
    }

    public function it_GetSessionIndex():void
    {
        $this->setEnvVariables();

        $this->getSessionIndex()->shouldBeEqualTo($this->vars["Session-Index"]);
    }

    public function it_GetCookieName():void
    {
        $this->setEnvVariables();

        $this->getCookieName()->shouldBeEqualTo($this->vars["Cookie-Name"]);
    }

    public function it_GetPrefix():void
    {
        $this->setEnvVariables();

        //todo difference between shouldBe and shouldBeEqualTo
        $this->getPrefix()->shouldBeEqualTo($this->specPrefix);
    }

    public function it_isSessionExisting():void
    {
        $this->setEnvVariables();

        $this->isSessionExisting()->shouldBeBoolean();
        $this->isSessionExisting()->shouldBeEqualTo(true);
    }

    public function it_getField():void
    {
        $this->setEnvVariables();

        $this->getField("testKey")->shouldBeEqualTo("testValue");
    }

    public function it_getShortPrefixedValue():void
    {
        $this->setEnvVariables();

        $this->getPrefixedField("prefixedTestKey")->shouldBeEqualTo("prefixedTestValue");
    }

    public function it_getFullPrefixedValue():void
    {
        $this->setEnvVariables();

        $this->getPrefixedField("prefixedTestKey", false)
            ->shouldBeEqualTo("prefixedTestValue");
    }

    private function getFullPrefix(string $string):string
    {
        return $this->specPrefix . $this->specShibPrefix . $string;
    }

    private function setEnvVariables():void
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
            $_SERVER[$this->getFullPrefix($key)] = $var;
        }

        $_SERVER["testKey"] = "testValue";
        $_SERVER[$this->specPrefix . "prefixedTestKey"] = "prefixedTestValue";
    }
}
