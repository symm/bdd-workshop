<?php

namespace spec;

use Basket;
use Item;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasketSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Basket::class);
    }

    function it_adds_an_item_to_the_basket()
    {
        $item = new Item();
        $this->add($item);
        $this->items()->shouldContain($item);
        $this->items()->shouldHaveCount(1);
    }

    function it_returns_no_items_when_empty()
    {
        $this->items()->shouldHaveCount(0);
    }

    function it_adds_more_than_one_item()
    {
        $item = new Item();
        $item2 = new Item();
        $this->add($item);
        $this->add($item2);
        $this->items()->shouldContain($item);
        $this->items()->shouldContain($item2);
        $this->items()->shouldHaveCount(2);
    }

}
