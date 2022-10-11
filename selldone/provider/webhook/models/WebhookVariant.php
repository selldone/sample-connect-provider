<?php

namespace Selldone\provider\webhook\models;

use Carbon\Carbon;


class WebhookVariant
{
    /**
     * Stock keeping unit.
     * @var string|null
     */
    public ?string $sku = null;

    /**
     * Manufacturer part number.
     * @var string
     */
    public string $mpn;


    /**
     * Product's Global Trade Item Number. Supported values are UPC (North America, 12 digits), EAN (Europe, 13 digits), JAN (Japan, 8 or 13 digits), ISBN (books, 13 digits).
     * @var string|null
     */
    public ?string $gtin = null;


    public ?string $color = null;

    public ?string $style = null;


    public ?string $volume = null;


    public ?string $weight = null;


    public ?string $pack = null;

    public ?string $type = null;

    /**
     * Variant has independent pricing.
     *
     * true: This variant has independent pricing final price: price + commission - discount.
     * false: This variant has same pricing as product.
     * @var bool
     */
    public bool $pricing = false;

    /**
     * The price value.
     * @var float
     */
    public float $price = 0;


    /**
     * Iso alpha3 currency code. USD, EUR, GBP, DKK, ...
     * @var string|null
     */
    public ?string $currency = null;


    /**
     * Added value to the price. The major use cases of commission are for wholesalers and affiliates.
     *      ● Wholesalers (Dropshipping suppliers): Default resellers commission.
     *      ● Affiliate: Can use as dynamic commission calculation per product.
     * @var float|null
     */
    public ?float $commission = 0;


    /**
     * The discount value.
     * @var float|null
     */
    public ?float $discount = 0;


    /**
     * Start date of the discount.
     * @var Carbon|null
     */
    public ?Carbon $dis_start = null;


    /**
     * End date of the discount.
     * @var Carbon|null
     */
    public ?Carbon $dis_end = null;


    /**
     * The quantity of items in stock.
     * @var int
     */
    public int $quantity = 0;


    /**
     * The image path can be URL or raw image path. You can convert any raw path to a full url.
     *
     * Replace all user lines (_) to slash (/).
     * Image url: https://cdn.selldone.com/app/converted path
     * @var string|null
     */
    public ?string $image = null;


    /**
     * The enable/disable status.
     * @var bool
     */
    public bool $enable = true;


    /**
     * Lead time is the amount of time that passes from the start of a process until its conclusion in hours. SD use product lead time to estimate order fulfilment duration.
     * @var int
     */
    public int $lead = -1;


    /**
     * Product packaging info with {weight, width, length, height} structure. Dimension globally set in shop options.
     * @var array|null
     */
    public ?array $extra = null;


    /**
     * List of product image URLs. Main product image (icon) should not included.
     * @var array|null
     */
    public ?array $images = null;


    /**
     * @param string $mpn
     * @param string|null $color
     * @param string|null $style
     * @param string|null $volume
     * @param string|null $weight
     * @param string|null $pack
     * @param string|null $type
     * @param int $quantity
     * @param string|null $image
     */
    public function __construct(string $mpn, ?string $color, ?string $style, ?string $volume, ?string $weight, ?string $pack, ?string $type, int $quantity, ?string $image)
    {
        $this->mpn = $mpn;

        $this->color = $color;
        $this->style = $style;
        $this->volume = $volume;
        $this->weight = $weight;
        $this->pack = $pack;
        $this->type = $type;


        $this->quantity = $quantity;

        $this->image = $image;
    }


    public function setPricing(float $price, string $currency, float $discount, ?Carbon $dis_start, ?Carbon $dis_end): self
    {
        $this->pricing = true;

        $this->price = $price;
        $this->currency = $currency;


        $this->discount = $discount;
        $this->dis_start = $dis_start;
        $this->dis_end = $dis_end;
        return $this;
    }


    public function addImages(...$images): self
    {
        if (!$this->images) $this->images = [];
        array_push($this->images, ...$images);
        return $this;

    }

    /**
     * @param string|null $sku
     * @return self
     */
    public function setSku(?string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @param string|null $gtin
     * @return self
     */
    public function setGtin(?string $gtin): self
    {
        $this->gtin = $gtin;
        return $this;
    }


    /**
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @param int $lead
     * @return self
     */
    public function setLead(int $lead): self
    {
        $this->lead = $lead;
        return $this;
    }

    /**
     * @param int $weight
     * @param int $width
     * @param int $length
     * @param int $height
     * @return self
     */
    public function setExtra(int $weight, int $width, int $length, int $height): self
    {
        $this->extra = ['weight' => $weight, 'width' => $width, 'length' => $length, 'height' => $height];

        return $this;
    }

}
