<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Selldone\provider\enums\ProductType;
use Selldone\provider\errors\ErrorResponse;
use Selldone\provider\ProviderClient;
use Selldone\provider\webhook\models\WebhookCategory;
use Selldone\provider\webhook\models\WebhookProduct;
use Selldone\provider\webhook\models\WebhookVariant;
use Selldone\provider\webhook\WebhookNotifyShop;

class WebhooksController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function notifyShop(Request $request)
    {

        // ━━━━━━━━━━━━━━━━━ Initialize and verify webhook ━━━━━━━━━━━━━━━━━
        $providerClient = self::newProviderClient();
        try {
            $webhook = $providerClient->webhook($request)->onNotifyShop();
        } catch (Exception $e) {
            return ErrorResponse::Exception($e);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


        // ━━━━━━━━━━━━━━━━━━━━━━━ Check access token ━━━━━━━━━━━━━━━━━━━━━━━
        $token = $webhook->getToken();
        if ($token != 'Bearer ' . Controller::SAMPLE_ACCESS_TOKEN) {
            return response("Invalid access token!", 403);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


        // ━━━━━━━━━━━━━━━━━━━━━━━ Prepare the response ━━━━━━━━━━━━━━━━━━━━━━━
        $action = $webhook->getAction();

        if ($action == WebhookNotifyShop::ACTION_TEST) {
            return [['name' => 'Categories count', 'value' => 12],
                ['name' => 'Products count', 'value' => 85],
                ['name' => 'Status', 'value' => 'Active'],
                ['name' => 'Message', 'value' => 'Some note...']];

        } else if ($action == WebhookNotifyShop::ACTION_ADD) {
            return ['success' => true];
        } else if ($action == WebhookNotifyShop::ACTION_REMOVE) {
            return ['success' => true];
        }

        return null;
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


    }


    public function syncCategories(Request $request)
    {

        // ━━━━━━━━━━━━━━━━━ Initialize and verify webhook ━━━━━━━━━━━━━━━━━
        $providerClient = self::newProviderClient();
        try {
            $webhook = $providerClient->webhook($request)->onSyncCategories();
        } catch (Exception $e) {
            return ErrorResponse::Exception($e);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


        // ━━━━━━━━━━━━━━━━━━━━━━━ Check access token ━━━━━━━━━━━━━━━━━━━━━━━
        $token = $webhook->getToken();
        if ($token != 'Bearer ' . Controller::SAMPLE_ACCESS_TOKEN) {
            return response("Invalid access token!", 403);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        // ━━━━━━━━━━━━━━━━━━━━━━━ Prepare the response ━━━━━━━━━━━━━━━━━━━━━━━
        $response = $webhook->response()
            ->addCategory(new WebhookCategory('sample-sync', 'Sample Sync', 'Some note...', null, null))
            ->setTotal(1);

        return $response->toArray();
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


    }

    public function syncProducts(Request $request)
    {

        // ━━━━━━━━━━━━━━━━━ Initialize and verify webhook ━━━━━━━━━━━━━━━━━
        $providerClient = self::newProviderClient();
        try {
            $webhook = $providerClient->webhook($request)->onSyncProducts();
        } catch (Exception $e) {
            return ErrorResponse::Exception($e);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


        // ━━━━━━━━━━━━━━━━━━━━━━━ Check access token ━━━━━━━━━━━━━━━━━━━━━━━
        $token = $webhook->getToken();
        if ($token != 'Bearer ' . Controller::SAMPLE_ACCESS_TOKEN) {
            return response("Invalid access token!", 403);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        // ━━━━━━━━━━━━━━━━━━━━━━━ Prepare the response ━━━━━━━━━━━━━━━━━━━━━━━
        $response = $webhook->response();


        $product_1 = new WebhookProduct("1001", ProductType::PHYSICAL, 59, 'USD', "iPhone 14 Pro and iPhone 14 Pro Max", "Krijg nu gratis Apple TV+ voor 3 maanden & 6 maanden Apple music cadeau", 10, "https://selldone.com/images/weekly-reports/1.jpg");
        $product_1->setDiscount(5, Carbon::now()->subDay(), Carbon::now()->addMonth())
            ->addImages("https://selldone.com/images/weekly-reports/40.jpg", "https://selldone.com/images/weekly-reports/41.jpg")
            ->setStyle(false)
            ->addVariants(
                new WebhookVariant("1001-1", '#0097A7', null, "Small", null, null, null, 10, "https://selldone.com/images/weekly-reports/42.jpg"),
                new WebhookVariant("1001-2", '#AFB42B', null, "Small", null, null, null, 10, "https://selldone.com/images/weekly-reports/43.jpg"),
                new WebhookVariant("1001-3", '#F57C00', null, "Medium", null, null, null, 10, "https://selldone.com/images/weekly-reports/44.jpg"),
            );

        $response->addProduct($product_1)->setTotal(1);


        return $response->toArray();
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


    }

    public function createOrder(Request $request)
    {

        // ━━━━━━━━━━━━━━━━━ Initialize and verify webhook ━━━━━━━━━━━━━━━━━
        $providerClient = self::newProviderClient();
        try {
            $webhook = $providerClient->webhook($request)->onCreateOrder();
        } catch (Exception $e) {
            return ErrorResponse::Exception($e);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


        // ━━━━━━━━━━━━━━━━━━━━━━━ Check access token ━━━━━━━━━━━━━━━━━━━━━━━
        $token = $webhook->getToken();
        if ($token != 'Bearer ' . Controller::SAMPLE_ACCESS_TOKEN) {
            return response("Invalid access token!", 403);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        // ━━━━━━━━━━━━━━━━━━━━━━━ Prepare the response ━━━━━━━━━━━━━━━━━━━━━━━
        $response = $webhook->response(165, 'USD')
            ->setRetailCosts('USD', 200, 10, 10, 0, 0, 0, 20, 220)
            ->setServiceCosts('USD', 120, 20, 10, 0, 30, 15, 0, 165);

        if ($webhook->confirm) {
            // Auto confirm...
            $response->setConfirmAt(Carbon::now());
        }

        return $response;
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


    }

    public function confirmOrder(Request $request)
    {

        // ━━━━━━━━━━━━━━━━━ Initialize and verify webhook ━━━━━━━━━━━━━━━━━
        $providerClient = self::newProviderClient();
        try {
            $webhook = $providerClient->webhook($request)->onConfirmOrder();
        } catch (Exception $e) {
            return ErrorResponse::Exception($e);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


        // ━━━━━━━━━━━━━━━━━━━━━━━ Check access token ━━━━━━━━━━━━━━━━━━━━━━━
        $token = $webhook->getToken();
        if ($token != 'Bearer ' . Controller::SAMPLE_ACCESS_TOKEN) {
            return response("Invalid access token!", 403);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        // ━━━━━━━━━━━━━━━━━━━━━━━ Prepare the response ━━━━━━━━━━━━━━━━━━━━━━━
        $response = $webhook->response(165, 'USD')
            ->setRetailCosts('USD', 200, 10, 10, 0, 0, 0, 20, 220)
            ->setServiceCosts('USD', 120, 20, 10, 0, 30, 15, 0, 165)
            ->setConfirmAt(Carbon::now());

        return $response;
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


    }


    public function getOrder(Request $request)
    {

        // ━━━━━━━━━━━━━━━━━ Initialize and verify webhook ━━━━━━━━━━━━━━━━━
        $providerClient = self::newProviderClient();
        try {
            $webhook = $providerClient->webhook($request)->onGetOrder();
        } catch (Exception $e) {
            return ErrorResponse::Exception($e);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


        // ━━━━━━━━━━━━━━━━━━━━━━━ Check access token ━━━━━━━━━━━━━━━━━━━━━━━
        $token = $webhook->getToken();
        if ($token != 'Bearer ' . Controller::SAMPLE_ACCESS_TOKEN) {
            return response("Invalid access token!", 403);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        // ━━━━━━━━━━━━━━━━━━━━━━━ Prepare the response ━━━━━━━━━━━━━━━━━━━━━━━
        $response = $webhook->response(165, 'USD')
            ->setRetailCosts('USD', 200, 10, 10, 0, 0, 0, 20, 220)
            ->setServiceCosts('USD', 120, 20, 10, 0, 30, 15, 0, 165)
            ->setCarrier('Fedex', 'https://fedex.com/track/12345000000')
            ->setConfirmAt(Carbon::now()->subDay());

        return $response;
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


    }


    public function cancelOrder(Request $request)
    {

        // ━━━━━━━━━━━━━━━━━ Initialize and verify webhook ━━━━━━━━━━━━━━━━━
        $providerClient = self::newProviderClient();
        try {
            $webhook = $providerClient->webhook($request)->onCancelOrder();
        } catch (Exception $e) {
            return ErrorResponse::Exception($e);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


        // ━━━━━━━━━━━━━━━━━━━━━━━ Check access token ━━━━━━━━━━━━━━━━━━━━━━━
        $token = $webhook->getToken();
        if ($token != 'Bearer ' . Controller::SAMPLE_ACCESS_TOKEN) {
            return response("Invalid access token!", 403);
        }
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        // ━━━━━━━━━━━━━━━━━━━━━━━ Prepare the response ━━━━━━━━━━━━━━━━━━━━━━━
        $response = $webhook->response(165, 'USD')
            ->setRetailCosts('USD', 200, 10, 10, 0, 0, 0, 20, 220)
            ->setServiceCosts('USD', 120, 20, 10, 0, 30, 15, 0, 165)
            ->setCarrier('Fedex', 'https://fedex.com/track/12345000000')
            ->setConfirmAt(Carbon::now()->subDay())
            ->setCancelAt(Carbon::now());

        return $response;
        // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


    }


}
