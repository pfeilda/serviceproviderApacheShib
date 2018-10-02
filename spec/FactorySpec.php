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
 *
 */

namespace spec\DanielPfeil\ServiceProviderApacheShib;

use DanielPfeil\ServiceProviderApacheShib\Factory;
use PhpSpec\ObjectBehavior;

class FactorySpec extends ObjectBehavior
{
    private $factoryClass = Factory::class;

    final public function let() :void
    {
        $this->beConstructedThrough('getInstance');
    }

    final public function it_is_initialisable()
    {
        $this->shouldBeAnInstanceOf(\DanielPfeil\ServiceProviderAuthenticator\Factory::class);
        $this->shouldBeAnInstanceOf(Factory::class);
    }

    final public function its_get_serviceprovider_return_null_if_data_is_null()
    {
        $this->getServiceProvider();
    }

    final public function its_get_serviceprovider_returns_null_if_data_prefix_is_bool()
    {
        $this->getServiceProvider(["prefix"=>true]);
    }

    final public function its_get_serviceprovider_returns_null_if_data_prefix_is_float()
    {
        $this->getServiceProvider(["prefix"=>8.7]);
    }

    final public function its_get_serviceprovider_returns_null_if_data_prefix_is_array()
    {
        $this->getServiceProvider(["prefix"=>[]]);
    }


    final public function its_get_serviceprovider_returns_serviceprovider_if_data_prefix_is_string()
    {
        $this->getServiceProvider(["prefix"=>"test"]);
    }

    final public function its_get_serviceprovider_returns_serviceprovider_if_data_prefix_is_int()
    {
        $this->getServiceProvider(["prefix"=>1]);
    }

}
