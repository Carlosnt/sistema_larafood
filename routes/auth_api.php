<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\OrderTenantController;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function (){
    Route::get('/my-orders', [OrderTenantController::class, 'index'])->middleware(['auth']);
    Route::patch('/my-orders', [OrderTenantController::class, 'update'])->middleware(['auth']);
});
