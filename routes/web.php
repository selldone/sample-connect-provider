<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/
Route::get('/auth/login', [AuthorizationController::class, 'login'])->middleware('cache.headers:private,max-age=0;');

Route::get('/auth/login/accept', [AuthorizationController::class, 'accept'])->middleware('cache.headers:private,max-age=0;');

Route::get('/auth/login/reject', [AuthorizationController::class, 'reject'])->middleware('cache.headers:private,max-age=0;');


/*
|--------------------------------------------------------------------------
| Token
|--------------------------------------------------------------------------
*/
Route::post('/auth/token', [Controller::class, 'token'])->middleware('cache.headers:private,max-age=0;');


/*
|--------------------------------------------------------------------------
| Other routes
|--------------------------------------------------------------------------
*/
Route::get('/{any?}', [PagesController::class, 'index']);
