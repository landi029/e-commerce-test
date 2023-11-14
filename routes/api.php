<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ProductVariantsController;

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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['prefix' => 'v1'], function() {
    Route::get('products', [ProductsController::class, 'index']);
    Route::get('cart/{cart}', [ProductVariantsController::class, 'getCart']);
    Route::group(['middleware' => 'auth:sanctum'], function () {
        // Route::apiResource('tasks', ProductsController::class)->except(['index']);
    });
});
