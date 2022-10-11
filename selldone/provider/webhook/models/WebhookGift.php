<?php

namespace Selldone\provider\webhook\models;

class WebhookGift
{

    /**
     * A short title for the gift.
     * @var string|null
     */
    public ?string $subject;


    /**
     * Message for gift.
     * @var string|null
     */
    public ?string $message ;





    public function __construct(?array $response)
    {
        foreach ($response as $key => $value) {
            $this->$key = $value;
        }

    }


}
