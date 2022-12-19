<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('auth/register','App\Http\Controllers\RegisterController@action');
Route::post('auth/login','App\Http\Controllers\LoginController');
route::post('auth/logout', 'App\Http\Controllers\LogoutController');

route::get('customers', 'App\Http\Controllers\CustomerController@index');
route::get('search', 'App\Http\Controllers\CustomerController@search');
route::post('stripe', 'App\Http\Controllers\StripePaymentController@stripeCheckout');