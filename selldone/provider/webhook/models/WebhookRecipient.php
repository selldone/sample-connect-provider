<?php

namespace Selldone\provider\webhook\models;

class WebhookRecipient
{

    /**
     * Full name of recipient.
     * @var string|null
     */
    public ?string $name;


    /**
     * Company name, if order is for a company.
     * @var string|null
     */
    public ?string $company;


    /**
     * Address line 1.
     * @var string|null
     */
    public ?string $address1 = null;


    /**
     * Address line 2. Always is null!
     * @var string|null
     */
    public ?string $address2 = null;


    public ?string $city = null;


    /**
     * State code if available.
     * @var string|null
     */
    public ?string $state_code = null;

    /**
     * State name if available.
     * @var string|null
     */
    public ?string $state_name = null;


    /**
     * Country Iso alpha2 code.
     * @var string|null
     */
    public ?string $country_code = null;


    /**
     * Zip/Postal code.
     * @var string|null
     */
    public ?string $zip = null;

    /**
     * International phone number.
     * @var string|null
     */
    public ?string $phone = null;


    /**
     * Email address.
     * @var string|null
     */
    public ?string $email = null;


    /**
     * Tax number.
     * @var string|null
     */
    public ?string $tax_number = null;


    /**
     * Longitude location.
     * @var string|null
     */
    public ?string $lng = null;


    /**
     * Latitude location.
     * @var string|null
     */
    public ?string $lat = null;


    /**
     * Optional message from buyer.
     * @var string|null
     */
    public ?string $message = null;


    /**
     * @param array|null $response
     */
    public function __construct(?array $response)
    {
        foreach ($response as $key=>$value){
            $this->$key=$value;
        }

    }


}
