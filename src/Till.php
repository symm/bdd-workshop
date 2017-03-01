<?php

class Till
{
    protected $items = [];

    private $eligibleMdSandwiches = ["Sandwich"];
    private $eligibleMdCrisps = ["Walkers Smokey Bacon Crisps", "Walkers Salted Crisps"];
    private $eligibleMdSmoothies = ["Mango Smoothie", "Strawberry Smoothie"];

    public function scanItems(array $items)
    {
        foreach($items as $item) {
            $this->items[] = $item;
        }
    }

    public function items()
    {
        return $this->items;
    }

    public function total()
    {
        $total = 0;

        $mdSandwiches = 0;
        $mdCrisps = 0;
        $mdSmoothies = 0;

        foreach ($this->items as $item) {
            if (in_array($item->name, $this->eligibleMdSandwiches)) {
                $mdSandwiches++;
            }
            if (in_array($item->name, $this->eligibleMdSmoothies)) {
                $mdSmoothies++;
            }
            if (in_array($item->name, $this->eligibleMdCrisps)) {
                $mdCrisps++;
            }

            $total += $item->price;
        }

        $mealDeals = min($mdSandwiches, $mdCrisps, $mdSmoothies);

        $total -= ($mealDeals * 165);

        return $total;
    }

}
