<?php

namespace Selldone\provider\webhook;

use Exception;
use Illuminate\Support\Facades\Validator;
use Selldone\provider\webhook\models\WebhookFulfillment;
use Selldone\provider\webhook\models\WebhookGift;
use Selldone\provider\webhook\models\WebhookOrderItem;
use Selldone\provider\webhook\models\WebhookPackageSlip;
use Selldone\provider\webhook\models\WebhookRecipient;
use Selldone\provider\webhook\models\WebhookRetailCost;
use Selldone\provider\webhook\responses\UpdateOrderResponse;


class WebhookConfirmOrder extends WebhookAbstract
{


    /**
     * Reference shop id.
     * @var int
     */
    public int $shop_id;


    /**
     * Fulfillment id on Selldone. A shopping cart can be divided into one or more fulfillments. Each fulfillment belongs to a provider.
     * Basket 🠮
     * ┗━━━━ ❶ fulfilment 1 🠮 Provider X ● current
     * ┗━━━━ ❷ fulfilment 2 🠮 Provider Y, ...
     * @var int
     */
    public int $id;


    /**
     * Basket reference id on Selldone. Don't use this value as unique identifier of orders.
     * @var int
     */
    public int $basket_id;


    /**
     * Always is Confirm.
     * @var string
     */
    public string $action = 'Confirm';



    /**
     * The reference order in the Selldone.
     * @var WebhookFulfillment
     */
    public WebhookFulfillment $fulfillment;


    /**
     * @return void
     * @throws Exception
     */
    public function process()
    {

        $validator = Validator::make(
            $this->request->all(),
            [
                'shop_id' => 'required|integer|min:0',
                'id' => 'required|integer|min:1',
                'basket_id' => 'required|integer|min:0',
                'action' => 'required|string|in:Confirm',

                'fulfillment' => 'required|array',

            ]
        );
        if ($validator->fails()) {
            throw new Exception($validator->messages(), 400);
        }


        $this->shop_id = $this->request->input('shop_id');
        $this->id = $this->request->input('id');
        $this->basket_id = $this->request->input('basket_id');

        $this->action = $this->request->input('action');

        $this->fulfillment = new WebhookFulfillment($this->request->input('fulfillment'));
    }


    protected ?UpdateOrderResponse $_response = null;


    public function response(float $price,string $currency): UpdateOrderResponse
    {
        if (!$this->_response) $this->_response = new UpdateOrderResponse($this->id,$price,$currency);

        return $this->_response;
    }

}
