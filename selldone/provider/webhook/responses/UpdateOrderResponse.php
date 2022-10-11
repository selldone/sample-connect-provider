<?php

namespace Selldone\provider\webhook\responses;

use Carbon\Carbon;

class UpdateOrderResponse extends \stdClass
{

    public int $id;
    public float $price;
    public string $currency;
    public ?Carbon $confirm_at;
    public ?Carbon $cancel_at;


    public ?Carbon $fulfill_at;

    public ?array $service_costs;
    public ?array $retail_costs;

    public ?string $carrier;
    public ?string $tracking_url;
    public ?string $error;

    /**
     * @param int $id
     * @param float $price
     * @param string $currency
     */
    public function __construct(int $id, float $price, string $currency)
    {
        $this->id = $id;
        $this->price = $price;
        $this->currency = $currency;
    }

    /**
     * @param Carbon|null $confirm_at
     * @return UpdateOrderResponse
     */
    public function setConfirmAt(?Carbon $confirm_at): self
    {
        $this->confirm_at = $confirm_at;
        return $this;

    }

    /**
     * @param Carbon|null $cancel_at
     * @return UpdateOrderResponse
     */
    public function setCancelAt(?Carbon $cancel_at): self
    {
        $this->cancel_at = $cancel_at;
        return $this;

    }

    /**
     * @param Carbon|null $fulfill_at
     * @return UpdateOrderResponse
     */
    public function setFulfillAt(?Carbon $fulfill_at): self
    {
        $this->fulfill_at = $fulfill_at;
        return $this;
    }


    public function setServiceCosts(?string $currency, $subtotal, $discount, $shipping, $additional_fee, $fulfillment_fee, $tax, $vat, $total): self
    {
        $this->service_costs = [
            'currency' => $currency,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping' => $shipping,
            'additional_fee' => $additional_fee,
            'fulfillment_fee' => $fulfillment_fee,
            'tax' => $tax,
            'vat' => $vat,
            'total' => $total,
        ];
        return $this;
    }


    public function setRetailCosts(?string $currency, $subtotal, $discount, $shipping, $additional_fee, $fulfillment_fee, $tax, $vat, $total): self
    {
        $this->retail_costs = [
            'currency' => $currency,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping' => $shipping,
            'additional_fee' => $additional_fee,
            'fulfillment_fee' => $fulfillment_fee,
            'tax' => $tax,
            'vat' => $vat,
            'total' => $total,
        ];
        return $this;
    }

    /**
     * @param string|null $carrier
     * @param string|null $tracking_url
     * @return UpdateOrderResponse
     */
    public function setCarrier(?string $carrier, ?string $tracking_url): self
    {
        $this->carrier = $carrier;
        $this->tracking_url = $tracking_url;

        return $this;
    }


}
