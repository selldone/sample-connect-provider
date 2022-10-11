<?php

namespace Selldone\provider\webhook\models;

class WebhookPackageSlip
{

    /**
     * The email address.
     * @var string|null
     */
    public ?string $email;


    /**
     * The phone number.
     * @var string|null
     */
    public ?string $phone;


    /**
     * Shop logo url.
     * @var string|null
     */
    public ?string $logo_url;


    /**
     * Shop title.
     * @var string|null
     */
    public ?string $store_name;


    /**
     * Custom order ID.
     * @var string|null
     */
    public ?string $custom_order_id;


    public function __construct(?array $response)
    {
        foreach ($response as $key => $value) {
            $this->$key = $value;
        }

    }


}
