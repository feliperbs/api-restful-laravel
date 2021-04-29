<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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


Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('client', ClientController::class)->middleware('auth:api');

Route::resource('product', ProductController::class)->middleware('auth:api');

Route::resource('order', OrderController::class)->middleware('auth:api');

Route::prefix('clients')->group(function () {
    Route::get('/list', [ClientController::class, 'list'])->middleware('auth:api');
});

Route::prefix('products')->group(function () {
    Route::get('/list', [ProductController::class, 'list'])->middleware('auth:api');
});

Route::prefix('orders')->group(function () {
    Route::get('/list', [OrderController::class, 'list'])->middleware('auth:api');
});

