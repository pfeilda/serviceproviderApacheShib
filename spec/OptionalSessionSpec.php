<?php
/**
 * Copyright (C) 2018  Daniel Pfeil <daniel.pfeil@itpfeil.de
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
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
