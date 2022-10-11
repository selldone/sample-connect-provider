<?php

namespace Selldone\provider\webhook;

use Exception;
use Illuminate\Http\Request;

abstract class WebhookAbstract
{

    protected Request $request;
    public ?string $token;

    /**
     * Access token that was sent form your servers to Selldone on user authentication step.
     * ┣━━━ OAuth mode: Bearer + space + {access token}
     * ┣━━━ Basic mode: Basic + space + {username:password}
     *
     * Use this token to identify the user and their resources.
     *
     * @return array|string|null
     */
    public function getToken()
    {
        return $this->token;
    }


    /**
     * @param Request $request
     * @throws Exception
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->token = $this->request->header('Authorization');
        if (!$this->token) throw new Exception("Authentication token does not exist on the header!", 403);

        $this->process();
    }


    /**
     * @return mixed
     * @throws Exception
     */
    abstract public function process();


}
