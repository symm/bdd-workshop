<?php

namespace spec;

use Item;
use Till;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TillSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Till::class);
    }

    /**
     *
     */
    function it_scans_items()
    {
        $item = new Item();
        $items = [$item];
        $this->scanItems($items);
        $this->items()->shouldBeEqualTo($items);
    }

    function it_totals_items()
    {
        $item = new Item();
        $item->price=100;
        $item2 = new Item();
        $item2->price=126;
        $items = [$item,$item2];
        $this->scanItems($items);
        $this->total()->shouldBeEqualTo(226);

    }

    function it_calculates_meal_deal_correctly() {
        $item = new Item();
        $item->price=250;
        $item->name='Sandwich';
        $item2 = new Item();
        $item2->price=150;
        $item2->name='Mango Smoothie';
        $item3 = new Item();
        $item3->price = 65;
        $item3->name='Walkers Smokey Bacon Crisps';
        
        $items = [$item, $item2, $item3];
        $this->scanItems($items);
        $this->total()->shouldBeEqualTo(300);
    }
}
