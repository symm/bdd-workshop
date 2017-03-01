<?php

class Basket
{

    protected $items = [];

    public function add(Item $item) {
        $this->items[] = $item;
    }

    public function items() : array {
        return $this->items;
    }

}
