<?php

namespace Selldone\provider\webhook\models;

class WebhookRetailCost
{

    /**
     * Iso alpha3 currency code. USD, EUR, GBP, DKK, ...
     * @var string
     */
    public string $currency;


    /**
     * Sum of all items price * quantity.
     * @var float
     */
    public float $subtotal = 0;


    /**
     * Total discounts.
     * @var float
     */
    public float $discount = 0;


    /**
     * Shipping cost.
     * @var float
     */
    public float $shipping = 0;

    /**
     * Tax/Vat amount.
     * @var float
     */
    public float $tax = 0;


    /**
     * Final total order price.
     * @var float
     */
    public float $total = 0;


    public function __construct(?array $response)
    {
        foreach ($response as $key => $value) {
            $this->$key = $value;
        }

    }


}
