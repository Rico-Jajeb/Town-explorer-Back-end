<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\SettingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('throttle:60,1') 
    ->prefix('v1')
    ->group(function () {
        Route::get('/system-info', [SettingController::class, 'index']);
        Route::put('/system-update', [SettingController::class, 'update']);
});

