<?php


namespace spec\DanielPfeil\ServiceProviderApacheShib;


use DanielPfeil\ServiceProviderApacheShib\OptionalSession;
use DanielPfeil\ServiceProviderApacheShib\ServiceProvider;
use Minimalcode\Optional\AbstractOptional;
use PhpSpec\ObjectBehavior;

final class OptionalSessionSpec extends ObjectBehavior
{
    private $serviceProvider;

    final public function let()
    {
        $this->serviceProvider = new ServiceProvider("AJB_");

        $this->beConstructedThrough("of", [$this->serviceProvider]);

    }

    final public function it_supports_wrong_type(): void
    {
        $this->beConstructedThrough("of", ["WrongType"]);
        $this->shouldThrow(new \TypeError())->duringInstantiation();
    }

    final public function it___construct(): void
    {
        $this->shouldBeAnInstanceOf(OptionalSession::class);
        $this->shouldBeAnInstanceOf(AbstractOptional::class);
    }
}