<?php

use App\Http\Controllers\AuthUser\Customer\LoginApi;
use App\Http\Controllers\Customer\CustomerDetails;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/auth/customer', [LoginApi::class, 'LoginRequest']);

Route::middleware('auth:sanctum')->get('/customer/profile', [CustomerDetails::class, 'GetProfile']);

