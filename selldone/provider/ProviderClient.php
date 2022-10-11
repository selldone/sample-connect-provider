<?php

namespace Selldone\provider;

use Illuminate\Http\Request;
use Selldone\provider\webhook\Webhooks;

class ProviderClient
{

    protected ?string $webhook_sign_key = null;
    protected ?string $secret_key = null;

    /**
     * @param string $webhook_sign_key
     * @param string $secret_key
     */
    public function __construct(string $webhook_sign_key, string $secret_key)
    {
        $this->webhook_sign_key = $webhook_sign_key;
        $this->secret_key = $secret_key;
    }


    /**
     * @param Request $request
     * @return Webhooks
     * @throws \Exception
     */
    public function webhook(Request $request): Webhooks
    {

        return  new Webhooks($this->webhook_sign_key,$request);
    }




}
