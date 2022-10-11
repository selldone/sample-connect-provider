<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(Request $request)
    {
        $config = [
            'return_url' => config('selldone.provider-return-url'),
            'webhook_sign_key' => config('selldone.provider-webhook-sign-key'),
            'secret_key' =>  config('selldone.provider-secret-key'),

            'client_id' => self::CLIENT_ID,
            'client_secret' => self::CLIENT_SECRET,
            'login_url' => url('/auth/login'),
            'token_url' => url('/auth/token'),

            'notify_shop' => url('/api/shop'),
            'sync_category' => url('/api/categories'),
            'sync_product' => url('/api/products'),
            'create_order' => url('/api/create-order'),
            'confirm_order' => url('/api/confirm-order'),
            'get_order' => url('/api/get-order'),
            'cancel_order' => url('/api/cancel-order'),

            'service_url' =>  config('selldone.provider-api'),

            'user' => [
                'access_token' => self::SAMPLE_ACCESS_TOKEN
            ]


        ];
        return view('index', compact('config'));

    }


}
