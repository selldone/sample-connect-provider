<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Selldone\provider\ProviderClient;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    /*
    |--------------------------------------------------------------------------
    | Client | This is client information that you built on your service.
    |--------------------------------------------------------------------------
    | You should set these values on your Selldone > Your provider.
    */

    const CLIENT_ID = "100";
    const CLIENT_SECRET = "Ayjdsdnbsdbnbd765sdiksdnhsd98sd69jhoklfds4dfgdsfg";

    /*
    |--------------------------------------------------------------------------
    | Sample Tokens | These are just sample code/token to test.
    |--------------------------------------------------------------------------
    */

    const SAMPLE_AUTHENTICATION_CODE = "sample-auth-code=xxxxxxxxxxxxxxxxxxxxxxxxxx";
    const SAMPLE_ACCESS_TOKEN = "sample-access-token-Izfsldfjsdkfj324o5345jh34jk5345345476";




    protected static function newProviderClient(): ProviderClient
    {
       return new ProviderClient(config('selldone.provider-webhook-sign-key'), config('selldone.provider-secret-key'));
    }
}
