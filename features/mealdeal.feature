Feature: As a busy professional
  I would like a lunch time meal deal
  So I can get a great value lunch with some choice

Background:
  Given the following Items exist:
    | Name | Price|
    | Sandwich | 250 |
    | Strawberry Smoothie | 150 |
    | Mango Smoothie      | 150 |
    | Wholemeal Bread     | 125 |
    | Walkers Salted Crisps | 65 |
    | Walkers Smokey Bacon Crisps | 65 |
    | Tyrells Crisps              | 100 |

Scenario: No meal deal items in basket
  Given I don't have any meal deal items in my basket
  When I check out
  Then Total is the sum of the individual items

Scenario: Meal deal in basket
  Given I have the following Items in my Basket:
    | Name | Quantity|
    | Sandwich | 1   |
    | Strawberry Smoothie| 1|
    | Walkers Salted Crisps | 1|
  When I check out
  Then The total should be "300"

Scenario: 2 Meal deals in basket
  Given I have the following Items in my Basket:
    | Name | Quantity|
    | Sandwich | 2   |
    | Strawberry Smoothie| 2|
    | Walkers Salted Crisps | 2|
  When I check out
  Then The total should be "600"

Scenario: 2 Meal Deal items and something else:
  Given I have the following Items in my Basket:
    | Name | Quantity|
    | Sandwich | 1   |
    | Strawberry Smoothie| 1|
    | Tyrells Crisps | 1|
  When I check out
  Then The total should be "500"

Scenario: 1 Meal Deal and something else:
  Given I have the following Items in my Basket:
    | Name | Quantity|
    | Sandwich | 1   |
    | Strawberry Smoothie| 1|
    | Walkers Salted Crisps | 1|
    | Tyrells Crisps | 1|
  When I check out
  Then The total should be "400"

