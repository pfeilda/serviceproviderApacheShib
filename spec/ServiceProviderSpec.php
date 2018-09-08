<?php
namespace spec\DanielPfeil\ServiceProviderApacheShib;

include_once "../../autoload.php";

use DanielPfeil\ServiceProviderApacheShib\ServiceProvider;
use PhpSpec\ObjectBehavior;

class ServiceProviderSpec extends ObjectBehavior
{
    private $_prefix = "AJP_";
    private $_shibPrefix = "Shib-";
    private $vars = null;

    public function let() {
        $this->beConstructedWith($this->_prefix);

        $this->vars = array(
            "Application-ID" => "default",
            "Session-ID" => "_testSessionId18234",
            "Identity-Provider" => "https://idp.dev/idp/shibboleth",
            "Authentication-Instant" => "2018-01-18T00:54:21.960Z",
            "Authentication-Method" => "urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport",
            "AuthnContext-Class" => "urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport",
            "Cookie-Name" => "TestCookieName89841"
        );

        foreach ($this->vars as $key => $var) {
            $_SERVER[$this->_prefix . $this->_shibPrefix . $key] = $var;
        }
    }

    public function it_test__construct()
    {
        $this->shouldBeAnInstanceOf(ServiceProvider::class);
        $this->shouldBeAnInstanceOf(\DanielPfeil\ServiceProviderAuthenticator\ServiceProvider::class);
    }

    public function it_testGetApplicationID()
    {
        $this->getApplicationID()->shouldBeEqualTo($this->vars["Application-ID"]);
    }

    public function it_testGetSessionId()
    {
        $this->getSessionId()->shouldBeEqualTo($this->vars["Session-ID"]);
    }

    public function it_testGetIdentityProvider()
    {
        $this->getIdentityProvider()->shouldBeEqualTo($this->vars["Identity-Provider"]);
    }

    public function it_testGetAuthenticationInstant()
    {
        $this->getAuthenticationInstant()->shouldBeEqualTo($this->vars["Authentication-Instant"]);
    }

    public function it_testGetAuthenticationMethod()
    {
        $this->getAuthenticationInstant()->shouldBeEqualTo($this->vars["Authentication-Method"]);
    }

    public function it_testGetAuthenticationContextClass()
    {

    }

    public function it_testGetCookieName()
    {
        $this->getCookieName()->shouldBeEqualTo($this->vars[""])
    }

    public function it_testGetPrefix()
    {
        //todo difference between shouldBe and shouldBeEqualTo
        $this->getPrefix()->shouldBeEqualTo($this->_prefix);
    }
}
