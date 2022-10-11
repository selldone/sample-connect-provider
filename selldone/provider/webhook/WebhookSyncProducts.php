<?php

namespace Selldone\provider\webhook;

use Exception;
use Illuminate\Support\Facades\Validator;
use Selldone\provider\webhook\responses\SyncCategoriesResponse;
use Selldone\provider\webhook\responses\SyncProductsResponse;

class WebhookSyncProducts extends WebhookAbstract
{



    public int $offset = 0;
    public int $limit = 100;
    public ?int $shop_id = null;



    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return int|null
     */
    public function getShopId(): ?int
    {
        return $this->shop_id;
    }


    /**
     * @return void
     * @throws Exception
     */
    public function process()
    {

        $validator = Validator::make(
            $this->request->all(),
            [
                'offset' => 'required|integer|min:0',
                'limit' => 'required|integer|min:1',
                'shop_id' => 'required|integer|min:0',
            ]
        );
        if ($validator->fails()) {
            throw new Exception($validator->messages(), 400);
        }




        $this->offset = $this->request->input('offset');
        $this->limit = $this->request->input('limit');
        $this->shop_id = $this->request->input('shop_id');


    }

    protected ?SyncProductsResponse $_response=null;


    public function response(): SyncProductsResponse
    {
        if(!$this->_response)$this->_response=new SyncProductsResponse();

        return $this->_response;
    }


}
