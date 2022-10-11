<?php

namespace Selldone\provider\webhook;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Webhooks
{
    protected ?string $webhook_sign_key = null;

    protected Request $request;

    /**
     * @param string $webhook_sign_key
     * @param Request $request
     * @throws Exception
     */
    public function __construct(string $webhook_sign_key, Request $request)
    {
        $this->webhook_sign_key = $webhook_sign_key;

        $this->request = $request;

        $this->validateWebhookSignature($request);
    }


    /**
     * @param Request $request
     * @return void
     * @throws Exception
     */
    protected function validateWebhookSignature(Request $request)
    {
        // Check webhook signature:
        $sign_id = $request->header('Selldone-Sign-Id');
        $sign_hash = $request->header('Selldone-Sign-Hash');

        if (!$sign_id || !$sign_hash || !Hash::check($this->webhook_sign_key . ":$sign_id", $sign_hash)) {
            throw new Exception("Invalid signature!",403);
        }
    }


    /**
     * @return WebhookNotifyShop
     * @throws Exception
     */
    public function onNotifyShop( ): WebhookNotifyShop
    {
       return new WebhookNotifyShop($this->request);
    }

    /**
     * @return WebhookSyncCategories
     * @throws Exception
     */
    public function onSyncCategories( ): WebhookSyncCategories
    {
        return new WebhookSyncCategories($this->request);
    }

    /**
     * @return WebhookSyncProducts
     * @throws Exception
     */
    public function onSyncProducts( ): WebhookSyncProducts
    {
        return new WebhookSyncProducts($this->request);
    }

    /**
     * @return WebhookCreateOrder
     * @throws Exception
     */
    public function onCreateOrder( ): WebhookCreateOrder
    {
        return new WebhookCreateOrder($this->request);
    }

    /**
     * @return WebhookConfirmOrder
     * @throws Exception
     */
    public function onConfirmOrder( ): WebhookConfirmOrder
    {
        return new WebhookConfirmOrder($this->request);
    }


    /**
     * @return WebhookGetOrder
     * @throws Exception
     */
    public function onGetOrder( ): WebhookGetOrder
    {
        return new WebhookGetOrder($this->request);
    }



    /**
     * @return WebhookCancelOrder
     * @throws Exception
     */
    public function onCancelOrder( ): WebhookCancelOrder
    {
        return new WebhookCancelOrder($this->request);
    }












}
