<?php

namespace spec;

use Greeter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GreeterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Greeter::class);
    }
}
