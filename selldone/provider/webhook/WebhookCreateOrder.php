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


class WebhookCreateOrder extends WebhookAbstract
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
     * Auto confirm status. This value can be true or false or null. Some providers prefer to have an extra order verification step. This option is available for merchants based on the provider's configuration.
     * @var bool
     */
    public bool $confirm = false;


    /**
     * Information about the address.
     * @var WebhookRecipient
     */
    public WebhookRecipient $recipient;


    /**
     * Array of items in the order. Important parameters are mpn and quantity to determine the purchased product and it's count.
     * @var array<WebhookOrderItem>
     */
    public array $items;


    /**
     * Retail costs that are to be displayed on the packing slip for international shipments.
     * @var WebhookRetailCost
     */
    public WebhookRetailCost $retail_costs;


    /**
     * Optional gift message for the packing slip.
     * @var WebhookGift|null
     */
    public ?WebhookGift $gift = null;


    /**
     * Custom packing slip for this order.
     * @var WebhookPackageSlip|null
     */
    public ?WebhookPackageSlip $packing_slip = null;


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
                'recipient' => 'required|array',
                'items' => 'required|array',

                'retail_costs' => 'required|array',
                'retail_costs.currency' => 'required|string|min:3|max:4',
                'retail_costs.total' => 'required|string',

                'gift' => 'nullable|array',
                'packing_slip' => 'nullable|array',


                'fulfillment' => 'required|array',

            ]
        );
        if ($validator->fails()) {
            throw new Exception($validator->messages(), 400);
        }


        $this->shop_id = $this->request->input('shop_id');
        $this->id = $this->request->input('id');
        $this->basket_id = $this->request->input('basket_id');

        $this->confirm = boolval($this->request->input('confirm'));

        $this->recipient = new WebhookRecipient($this->request->input('recipient'));

        $this->items = [];
        foreach ($this->request->input('items') as $it) {
            $this->items[] = new WebhookOrderItem($it);
        }


        $this->retail_costs = new WebhookRetailCost($this->request->input('retail_costs'));


        $this->gift = $this->request->input('gift') ? new WebhookGift($this->request->input('gift')) : null;


        $this->packing_slip = $this->request->input('packing_slip') ? new WebhookPackageSlip($this->request->input('packing_slip')) : null;


        $this->fulfillment = new WebhookFulfillment($this->request->input('fulfillment'));


    }


    protected ?UpdateOrderResponse $_response = null;


    public function response(float $price,string $currency): UpdateOrderResponse
    {
        if (!$this->_response) $this->_response = new UpdateOrderResponse($this->id,$price,$currency);

        return $this->_response;
    }

}
