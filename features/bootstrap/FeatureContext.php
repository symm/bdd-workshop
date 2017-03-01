<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

require_once __DIR__ . '/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    protected $basket;
    protected $till;
    private $inventory;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->basket = new Basket();
    }


    /**
     * @Given there is a :arg1, which costs £:arg2
     */
    public function thereIsAWhichCostsPs($arg1, $arg2)
    {
        throw new PendingException();
    }


    /**
     * @Given I don't have any meal deal items in my basket
     */
    public function iDonTHaveAnyMealDealItemsInMyBasket()
    {
        $bread = new Item();
        $bread->name = "Wholemeal Bread";
        $bread->price = 125;

        $tyrells = new Item();
        $tyrells->name = "Tyrells Crisps";
        $tyrells->price = 100;

        $this->basket = new Basket();
        $this->basket->add($bread);
        $this->basket->add($tyrells);

    }

    /**
     * @When I check out
     */
    public function iCheckOut()
    {
        $this->till = new Till();
        $this->till->scanItems($this->basket->items());
    }

    /**
     * @Then Total is the sum of the individual items
     */
    public function totalIsTheSumOfTheIndividualItems()
    {
        $total = $this->till->total();
        assertEquals(225,$total);
    }

    /**
     * @Given the following Items exist:
     */
    public function theFollowingItemsExist(TableNode $table)
    {
        $this->inventory = [];

        foreach ($table->getHash() as $value) {
            $item = new Item();
            $item->name = $value['Name'];
            $item->price = (int) $value['Price'];
            $this->inventory[$value['Name']] = $item;
         }
    }

    /**
     * @Given I have the following Items in my Basket:
     */
    public function iHaveTheFollowingItemsInMyBasket(TableNode $table)
    {
        $this->basket = new Basket();

        foreach ( $table->getHash() as $value) {
            $item = $this->inventory[$value['Name']];
            $quantity = (int)$value['Quantity'];
            for($i = 0; $i < $quantity; $i++) {
                $this->basket->add($item);
            }
        }
    }

    /**
     * @Then The total should be :expectedTotal
     */
    public function theTotalShouldBe($expectedTotal)
    {

        $total = $this->till->total();
        assertEquals((int)$expectedTotal,$total);
    }
}
