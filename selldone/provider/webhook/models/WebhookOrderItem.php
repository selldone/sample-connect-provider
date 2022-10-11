<?php

namespace Selldone\provider\webhook\models;

class WebhookOrderItem
{

    /**
     * Line item index, start from 1.
     * @var int
     */
    public int $index;


    /**
     * Sync variant ID of the item ordered. This value is the uid of the variant in the external connect service provider. Selldone keeps it in the variant mpn.
     *
     * We get this value when fetch products from your servers.
     * Use this value to determine which item has been ordered.
     * @var string
     */
    public string $mpn;


    /**
     * Number of items ordered.
     * @var int
     */
    public int $quantity;


    /**
     * The reference basket item ID in Selldone.
     * @var int|null
     */
    public ?int $id = null;

    /**
     * The reference basket ID in the Selldone.
     * @var int|null
     */
    public ?int $basket_id = null;


    /**
     * The reference product ID of the item ordered in the Selldone.
     * @var int|null
     */
    public ?int $product_id = null;

    /**
     * The reference variant ID of the item ordered in the Selldone.
     * @var int|null
     */
    public ?int $variant_id = null;


    /**
     * Original retail price of the item to be displayed on the packing slip.
     * @var string|null
     */
    public ?string $retail_price = null;


    /**
     * Display name of the item. If not given, a name from your system can be displayed on the packing slip.
     * @var string|null
     */
    public string $name;

    /**
     * Product identifier (SKU) on Selldone.
     *
     * Return variant SKU if variant ordered and SKU of variant available.
     * Return product SKU otherwise.
     * @var string|null
     */
    public ?string $sku = null;

    /**
     * @param array|null $response
     */
    public function __construct(?array $response)
    {
        foreach ($response as $key => $value) {
            $this->$key = $value;
        }

    }


}
