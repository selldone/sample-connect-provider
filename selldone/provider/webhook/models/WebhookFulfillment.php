<?php

namespace Selldone\provider\webhook\models;

use Carbon\Carbon;

class WebhookFulfillment
{

    /**
     * Unique ID of the item.
     * @var int
     */
    public int $id;


    /**
     * Unique ID of the shop. This item has a relation to the shop.
     * @var int
     */
    public int $shop_id;

    /**
     * Unique ID of the connect. Connect is an object that represent the connect bridge provider.
     * @var int|null
     */
    public ?int $connect_id;

    /**
     * Basket id reference.
     * @var int
     */
    public int $basket_id;

    /**
     * Last sync date of order information.
     * @var Carbon|null
     */
    public ?Carbon $sync_at;

    /**
     * Confirm date of the order.
     * @var Carbon|null
     */
    public ?Carbon $confirm_at;

    /**
     * Cancel date of the order.
     * @var Carbon|null
     */
    public ?Carbon $cancel_at;


    /**
     * Fulfillment date of the order.
     * @var Carbon|null
     */
    public ?Carbon $fulfill_at;


    /**
     * Last error in the plain text.
     * @var string|null
     */
    public ?string $error;


    /**
     * Partial order cost.
     * @var float
     */
    public float $price;

    /**
     * Iso alpha3 currency code. USD, EUR, GBP, DKK, ...
     * @var string
     */
    public string $currency;
    /**
     * Optional & Dynamic. Detail about external service cost. We get it from external connect service provider. Sample service cost object: {currency, subtotal, discount, shipping, digitization, additional_fee, fulfillment_fee, tax, vat, total}.
     * @var array|null
     */
    public ?array $service_costs;

    /**
     * Optional & Dynamic. Detail about retail cost. We get it from external connect service provider. Sample retail cost object: {currency, subtotal, discount, shipping, tax, vat, total}.
     * @var array|null
     */
    public ?array $retail_costs;

    public ?Carbon $created_at;
    public ?Carbon $updated_at;


    public function __construct(?array $response)
    {
        foreach ($response as $key => $value) {

            if (in_array($key, ['sync_at', 'confirm_at', 'cancel_at', 'fulfill_at', 'created_at', 'updated_at'])) {
                $this->$key = Carbon::parse($value);

            } else {
                $this->$key = $value;

            }
        }

    }


}
