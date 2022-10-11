<?php

namespace Selldone\provider\webhook\responses;

use Illuminate\Contracts\Support\Arrayable;
use Selldone\provider\webhook\models\WebhookProduct;

class SyncProductsResponse  extends \stdClass implements Arrayable
{


    /**
     * Force override non-pricing values on Selldone
     * @var bool
     */
    public bool $override = false;


    /**
     * Force override pricing values on Selldone
     * @var bool
     */
    public bool $override_price = false;


    public array $products = [];


    public int $total = 0;


    /**
     * @param array $products
     * @return self
     */
    public function setProducts(array $products): self
    {
        $this->products = $products;
        return $this;
    }

    public function addProduct(WebhookProduct $product): self
    {
        $this->products[] = $product;
        return $this;
    }

    /**
     * @param int $total
     * @return self
     */
    public function setTotal(int $total): self
    {
        $this->total = $total;
        return $this;
    }


    public function toArray()
    {
        if (!$this->total) {
            $this->total = sizeof($this->products);
        }
        return ['override' => $this->override/*Force override non-pricing values on Selldone*/, 'override_price' => $this->override_price/*Force override pricing values on Selldone*/, 'products' => $this->products, 'total' => $this->total];
    }
}
