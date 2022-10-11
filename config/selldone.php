<?php

return [





    /*
    |--------------------------------------------------------------------------
    | Connect Provider
    |--------------------------------------------------------------------------
    |
    | You can connect your service to the selldone via connect OS.
    |
    | Selldone Configs | You can find these values on Selldone > Your provider.
    | https://selldone.com/shuttle/providers
    |
    */

    'provider-api' => env('SD_PROVIDER_API', 'https://papi.seldone.com'),



    /*
    |--------------------------------------------------------------------------
    | Provider > Return URL
    |--------------------------------------------------------------------------
    |
    | This value is the return URL after authentication on your service. When
    | a user connect their shop to your service, you should return user to this url.
    | This value is created on Selldone > Provider panel.
    |
    |
    */

    'provider-return-url' => env('SD_PROVIDER_RETURN_URL', 'https://seldone.com/connect/xxx/callback'),

    /*
    |--------------------------------------------------------------------------
    | Provider > Webhook Sign Key
    |--------------------------------------------------------------------------
    |
    |
    */

    'provider-webhook-sign-key' => env('SD_PROVIDER_WEBHOOK_SIGN_KEY', 'provider-sign-...'),


    /*
    |--------------------------------------------------------------------------
    | Provider > Secret Key
    |--------------------------------------------------------------------------
    |
    |
    */

    'provider-secret-key' => env('SD_PROVIDER_SECRET_KEY', '1:provider-acc-...'),




];
