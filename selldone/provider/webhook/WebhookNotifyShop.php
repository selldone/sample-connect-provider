<?php

namespace Selldone\provider\webhook;

use Exception;
use Illuminate\Support\Facades\Validator;

class WebhookNotifyShop extends WebhookAbstract
{


    const ACTION_TEST="Test";
    const ACTION_ADD="Add";
    const ACTION_REMOVE="Remove";

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    public ?string $action = null;


    /**
     * @return void
     * @throws Exception
     */
    public function process()
    {

        $validator = Validator::make(
            $this->request->all(),
            [
                'action' => 'required|string|in:Add,Remove,Test',
            ]
        );
        if ($validator->fails()) {
            throw new Exception($validator->messages(), 400);
        }

        $this->action = $this->request->input('action');


    }


}
