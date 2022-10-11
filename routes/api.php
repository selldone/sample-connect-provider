<?php

use App\Http\Controllers\WebhooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Test / Get info about account to show to the user
|--------------------------------------------------------------------------
*/
Route::post('/shop', [WebhooksController::class, 'notifyShop']);
Route::get('/categories', [WebhooksController::class, 'syncCategories']);
Route::get('/products', [WebhooksController::class, 'syncProducts']);
Route::post('/create-order', [WebhooksController::class, 'createOrder']);
Route::post('/confirm-order', [WebhooksController::class, 'confirmOrder']);
Route::get('/get-order', [WebhooksController::class, 'getOrder']);
Route::post('/cancel-order', [WebhooksController::class, 'cancelOrder']);


