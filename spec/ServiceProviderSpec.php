<?php
namespace spec\DanielPfeil\ServiceProviderApacheShib;

use DanielPfeil\ServiceProviderApacheShib\ServiceProvider;
use PhpSpec\ObjectBehavior;

//todo add checks for null
class ServiceProviderSpec extends ObjectBehavior
{
    private $_prefix = "AJP_";
    private $_shibPrefix = "Shib-";
    private $vars = null;

    public function setEnvVariables():void{
        $this->beConstructedWith($this->_prefix);

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
            $_SERVER[$this->_prefix . $this->_shibPrefix . $key] = $var;
        }

        $_SERVER["testKey"] = "testValue";
        $_SERVER[$this->_prefix . "prefixedTestKey"] = "prefixedTestValue";
    }

    public function it_test__construct():void
    {
        $this->setEnvVariables();

        $this->shouldBeAnInstanceOf(ServiceProvider::class);
        $this->shouldBeAnInstanceOf(\DanielPfeil\ServiceProviderAuthenticator\ServiceProvider::class);
    }

    public function it_testGetApplicationID():void
    {
        $this->setEnvVariables();

        $this->getApplicationID()->shouldBeEqualTo($this->vars["Application-ID"]);
    }

    public function it_testGetSessionId():void
    {
        $this->setEnvVariables();

        $this->getSessionId()->shouldBeEqualTo($this->vars["Session-ID"]);
    }

    public function it_testGetIdentityProvider():void
    {
        $this->setEnvVariables();

        $this->getIdentityProvider()->shouldBeEqualTo($this->vars["Identity-Provider"]);
    }

    public function it_testGetAuthenticationInstant():void
    {
        $this->setEnvVariables();

        $this->getAuthenticationInstant()->shouldBeEqualTo($this->vars["Authentication-Instant"]);
    }

    public function it_testGetAuthenticationMethod():void
    {
        $this->setEnvVariables();

        $this->getAuthenticationMethod()->shouldBeEqualTo($this->vars["Authentication-Method"]);
    }

    public function it_testGetAuthenticationContextClass():void
    {
        $this->setEnvVariables();

        $this->getAuthenticationContextClass()->shouldBeEqualTo($this->vars["AuthnContext-Class"]);
    }

    public function it_testGetSessionIndex():void
    {
        $this->setEnvVariables();

        $this->getSessionIndex()->shouldBeEqualTo($this->vars["Session-Index"]);
    }

    public function it_testGetCookieName():void
    {
        $this->setEnvVariables();

        $this->getCookieName()->shouldBeEqualTo($this->vars["Cookie-Name"]);
    }

    public function it_testGetPrefix():void
    {
        $this->setEnvVariables();

        //todo difference between shouldBe and shouldBeEqualTo
        $this->getPrefix()->shouldBeEqualTo($this->_prefix);
    }

    public function it_isSessionExisting():void{
        $this->setEnvVariables();

        $this->isSessionExisting()->shouldBeBoolean();
        $this->isSessionExisting()->shouldBeEqualTo(true);
    }

    public function it_getField():void {
        $this->setEnvVariables();

        $this->getField("testKey")->shouldBeEqualTo("testValue");
    }

    public function it_getShortPrefixedValue():void {
        $this->setEnvVariables();

        $this->getPrefixedField("prefixedTestKey")->shouldBeEqualTo("prefixedTestValue");
    }

    public function it_getFullPrefixedValue():void {
        $this->setEnvVariables();

        $this->getPrefixedField("prefixedTestKey", false)
            ->shouldBeEqualTo("prefixedTestValue");
    }
}
