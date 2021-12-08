<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalesListController;

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

Route::group(['prefix' => 'v1'], function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // menu
    Route::get('/menu', [MenuController::class, 'index']);
    Route::post('/menu', [MenuController::class, 'store']);
    Route::post('/menu/upload', [MenuController::class, 'upload']);
    Route::get('/menu/{id}', [MenuController::class, 'show']);
    Route::put('/menu/{id}', [MenuController::class, 'update']);
    Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

    // user
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::get('/user', [UserController::class, 'index']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    // cart
    Route::get('/{id}/cart', [CartController::class, 'userCart']);
    Route::post('/cart', [CartController::class, 'store']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);
    Route::delete('/cart/user/{id}', [CartController::class, 'allDelete']);

    // order
    Route::get('/order', [OrderController::class, 'index']);
    Route::post('/{id}/order', [OrderController::class, 'create']);
    Route::put('/order/{id}', [OrderController::class, 'update']);
    Route::put('/order/list/{id}', [OrderController::class, 'listDelete']);

    Route::get('/order/user/{id}', [OrderController::class, 'myOrder']);
    Route::put('/order/cooked/{id}', [OrderController::class, 'cooked']);

    // salesList
    Route::get('/sales_list', [SalesListController::class, 'index']);
    Route::post('/sales_list', [SalesListController::class, 'store']);
    Route::get('/sales_list/{created_at}', [SalesListController::class, 'show']);



});
