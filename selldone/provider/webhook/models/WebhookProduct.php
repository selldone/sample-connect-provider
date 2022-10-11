<?php

namespace Selldone\provider\webhook\models;

use Carbon\Carbon;
use Selldone\provider\enums\PriceInputType;
use Selldone\provider\enums\ProductCondition;
use Selldone\provider\enums\ProductStatus;
use Selldone\provider\enums\ProductType;


class WebhookProduct
{
    /**
     * Can be PHYSICAL, VIRTUAL, SERVICE, FILE
     * {@see ProductType}
     * @var string
     */
    public string $type = ProductType::PHYSICAL;


    /**
     * Can be default, area, volume, custom
     * {@see PriceInputType}
     * @var string|null
     */
    public ?string $price_input = PriceInputType::DEFAULT;


    /**
     * The price value.
     * @var float
     */
    public float $price;


    /**
     * Iso alpha3 currency code. USD, EUR, GBP, DKK, ...
     * @var string
     */
    public string $currency;


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
     * Add extra info about price like ( $1.5/Fl Oz ). Use cases: grocery, FMCG.
     * @var string|null
     */
    public ?string $price_label = null;

    /**
     * Can be Open, or Close.
     *
     *      ● Open: Product available for online and in-person sale.
     *      ● Close: Product available only for in-person sale.
     *
     * {@see ProductStatus}
     * @var string|null
     */
    public ?string $status = ProductStatus::Open;


    /**
     * Title of the product.
     * @var string
     */
    public string $title;


    /**
     * Sub title of the product. Preferred to be in english.
     * @var string|null
     */
    public ?string $title_en = null;


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


    /**
     * Google product category code. Read more about GPC.
     * @var int|null
     */
    public ?int $gpc = null;


    /**
     * Can be new, refurbished, used, used_fair, used_good, used_like_new
     * {@see ProductCondition}
     * @var string
     */
    public string $condition = ProductCondition::NEW;


    /**
     * The brand name of the product.
     * @var string|null
     */
    public ?string $brand = null;


    /**
     * A short warranty condition and name.
     * @var string|null
     */
    public ?string $warranty = null;


    /**
     * A json of key/value pairs.
     *
     * Spec item structure: ex. "spec-1-title":["value1","value2"]
     *       ● Key: Spec item title
     *       ● Value: Array of spec item values.
     *
     *
     * Spec group title structure: ex. "Technical":"group"
     *       ● Key: Group title
     *       ● Value: Constant with group value.
     * @var array|null
     */
    public ?array $spec = null;
    /**
     * The list of keys in spec to define orders of items in table. ex. ["Technical","spec-1-title","spec-2-title"]
     *
     * @var array|null
     */
    public ?array $spec_order = null;


    /**
     * The list of advantage.
     *
     *       ● Key: Title of item.
     *       ● Value: Value of item.
     *
     * ex. {"Voltage":"220V","Material":"G-Wood"}
     * @var array|null
     */
    public ?array $pros = null;

    /**
     * The list of disadvantage.
     *
     *       ● Key: Title of item.
     *       ● Value: Value of item.
     * @var array|null
     */
    public ?array $cons = null;


    /**
     * This note will be shown to the customer in the product and basket page.
     * @var array|null
     */
    public ?array $message = null;


    /**
     * Only for Virtual products. The structure of output form. For example, if you want to show some values after virtual items purchase, you can define output form.
     * Item structure:
     *
     *       ● name: It should be unique in the form. We use name as key of entered values and find values in Excel import/export.
     *       ● title: Public title of the field.
     *       ● type: Type of the field. It can be null, select, switch, file, note
     *       ● selects: Optional, list of possible values in the select type.
     *       ● default: Optional, default value.
     *
     * ex. [{"name":"choice","title":"Select one type option","type":"select","selects":["Code A","Code B","Code C"]}]
     * @var array|null
     */
    public ?array $outputs = null;


    /**
     * The structure of input form. For example, if you want to get extra information about purchased product, you can define input form. User can fill out the form in checkout step and also after payment.
     * Item structure:
     *
     *       ● name: It should be unique in the form. We use name as key of entered values and find values in Excel import/export.
     *       ● title: Public title of the field.
     *       ● type: Type of the field. It can be null, select, switch, file, note
     *       ● selects: Optional, list of possible values in the select type.
     *       ● default: Optional, default value.
     *
     * ex. [{"name":"choice","title":"Select one type option","type":"select","selects":["Code A","Code B","Code C"]}]
     * @var array|null
     */
    public ?array $inputs = null;


    /**
     * The quantity of items in stock.
     * @var int
     */
    public int $quantity = 0;


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
     * Style of the product. ex. {"contain":true}
     *
     *       ● contain: boolean, true Image will be shown in the contain mode (Good for images with white background).false Image will be shown in the cover mode.
     * @var array|null
     */
    public ?array $style = null;


    /**
     *  The duration in hours to return goods after receiving order by buyer.
     * @var int|null
     */
    public ?int $return_warranty = null;


    /**
     *  Is product original.
     * @var bool
     */
    public bool $original = true;


    /**
     * Video ID on Youtube.
     * @var string|null
     */
    public ?string $video = null;


    /**
     * Product variants. Product can have variants.
     * @var array|null
     */
    public ?array $product_variants = null;


    /**
     * The category name. Make sure category has been added before.
     *
     *      ● null: Product will be added to root.
     *      ● category-name: It should match to the existed category name.
     *
     * @var string|null
     */
    public ?string $category = null;


    /**
     * List of product image URLs. Main product image (icon) should not included.
     * @var array|null
     */
    public ?array $images = null;


    /**
     * Main product image.
     * @var string|null
     */
    public ?string $icon = null;


    /**
     * Long product description. An article in simplified HTML or plain text. We use this value to create the product
     * description that will be shown in the description tab on the product page.
     * Recommended tags: p, b, i, a, ul, li, ol, span, table, td, tr
     *
     * @var string|null
     */

    public ?string $description = null;


    /**
     * @param string $mpn
     * @param string $type {@see ProductType}
     * @param float $price
     * @param string $currency
     * @param string $title
     * @param string|null $title_en
     * @param int|null $quantity Calculated automatically if this product has variants.
     * @param string|null $icon
     */
    public function __construct(string $mpn, string $type, float $price, string $currency, string $title, ?string $title_en, ?int $quantity, ?string $icon)
    {
        $this->mpn = $mpn;

        $this->type = $type;
        $this->price = $price;
        $this->currency = $currency;

        $this->title = $title;
        $this->title_en = $title_en;
        $this->quantity = $quantity?:0;

        $this->icon = $icon;

    }


    public function setDiscount(?float $discount, ?Carbon $dis_start, ?Carbon $dis_end): WebhookProduct
    {
        $this->discount = $discount;
        $this->dis_start = $dis_start;
        $this->dis_end = $dis_end;
        return $this;
    }

    public function addImages(...$images): WebhookProduct
    {
        if (!$this->images) $this->images = [];
        array_push($this->images, ...$images);
        return $this;

    }

    public function setCategory(?string $category): WebhookProduct
    {
        $this->category = $category;
        return $this;

    }

    public function addVariants(WebhookVariant ...$product_variants): WebhookProduct
    {
        if (!$this->product_variants) $this->product_variants = [];
        array_push($this->product_variants, ...$product_variants);
        return $this;

    }

    /**
     * @param string|null $price_input
     * @return WebhookProduct
     */
    public function setPriceInput(?string $price_input): WebhookProduct
    {
        $this->price_input = $price_input;
        return $this;

    }

    /**
     * @param float|null $commission
     * @return WebhookProduct
     */
    public function setCommission(?float $commission): WebhookProduct
    {
        $this->commission = $commission;
        return $this;
    }

    /**
     * @param string|null $price_label
     * @return WebhookProduct
     */
    public function setPriceLabel(?string $price_label): WebhookProduct
    {
        $this->price_label = $price_label;
        return $this;
    }

    /**
     * @param string|null $status
     * @return WebhookProduct
     */
    public function setStatus(?string $status): WebhookProduct
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param string|null $sku
     * @return WebhookProduct
     */
    public function setSku(?string $sku): WebhookProduct
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @param string|null $gtin
     * @return WebhookProduct
     */
    public function setGtin(?string $gtin): WebhookProduct
    {
        $this->gtin = $gtin;
        return $this;
    }

    /**
     * @param int|null $gpc
     * @return WebhookProduct
     */
    public function setGpc(?int $gpc): WebhookProduct
    {
        $this->gpc = $gpc;
        return $this;
    }

    /**
     * @param string|null $brand
     * @return WebhookProduct
     */
    public function setBrand(?string $brand): WebhookProduct
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @param string|null $warranty
     * @return WebhookProduct
     */
    public function setWarranty(?string $warranty): WebhookProduct
    {
        $this->warranty = $warranty;
        return $this;
    }


    /**
     * @param array|null $spec
     * @param array|null $spec_order
     * @return WebhookProduct
     */
    public function setSpec(?array $spec, ?array $spec_order): WebhookProduct
    {
        $this->spec = $spec;
        $this->spec_order = $spec_order;
        return $this;
    }


    /**
     * @param array|null $pros
     * @return WebhookProduct
     */
    public function setPros(?array $pros): WebhookProduct
    {
        $this->pros = $pros;
        return $this;
    }

    /**
     * @param array|null $cons
     * @return WebhookProduct
     */
    public function setCons(?array $cons): WebhookProduct
    {
        $this->cons = $cons;
        return $this;
    }

    /**
     * @param array|null $message
     * @return WebhookProduct
     */
    public function setMessage(?array $message): WebhookProduct
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param array|null $outputs
     * @return WebhookProduct
     */
    public function setOutputs(?array $outputs): WebhookProduct
    {
        $this->outputs = $outputs;
        return $this;
    }

    /**
     * @param array|null $inputs
     * @return WebhookProduct
     */
    public function setInputs(?array $inputs): self
    {
        $this->inputs = $inputs;
        return $this;
    }

    /**
     * @param int $quantity
     * @return WebhookProduct
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @param int|null $lead
     * @return WebhookProduct
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

    /**
     * @param bool $contain
     * @return WebhookProduct
     */
    public function setStyle(bool $contain): self
    {
        $this->style = ['contain' => $contain];
        return $this;
    }

    /**
     * @param int|null $return_warranty
     * @return WebhookProduct
     */
    public function setReturnWarranty(?int $return_warranty): self
    {
        $this->return_warranty = $return_warranty;
        return $this;
    }

    /**
     * @param bool $original
     * @return WebhookProduct
     */
    public function setOriginal(bool $original): self
    {
        $this->original = $original;
        return $this;
    }

    /**
     * @param string $condition
     * @return self
     */
    public function setCondition(string $condition): self
    {
        $this->condition = $condition;
        return $this;
    }


    /**
     * @param string|null $video
     * @return self
     */
    public function setVideo(?string $video): self
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }



}
