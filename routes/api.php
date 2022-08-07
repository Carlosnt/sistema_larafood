<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TenantApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\TableApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\AuthClientController;

Route::post('/sanctum/token', [AuthClientController::class, 'auth']);
Route::group(['middleware' => ['auth:sanctum']
    ], function (){
    Route::get('/auth/me', [AuthClientController::class, 'me']);
});


Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function (){
    Route::get('/tenants/{uuid}', [TenantApiController::class, 'show']);
    Route::get('/tenants', [TenantApiController::class, 'index']);

    Route::get('/categories/{url}', [CategoryApiController::class, 'show']);
    Route::get('/categories', [CategoryApiController::class, 'categoriesByTenant']);

    Route::get('/tables/{identify}', [TableApiController::class, 'show']);
    Route::get('/tables', [TableApiController::class, 'tablesByTenant']);

    Route::get('/products/{flag}', [ProductApiController::class, 'show']);
    Route::get('/products', [ProductApiController::class, 'productsByTenant']);

    Route::post('/client', [RegisterController::class, 'store']);

});


