<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('throttle:60,1') 
    ->prefix('v1')
    ->group(function () {
        Route::get('/system-info', [SettingController::class, 'index']);
        Route::put('/system-update', [SettingController::class, 'update']);
});



Route::prefix('v1')->middleware([
    EnsureFrontendRequestsAreStateful::class,
    'throttle:60,1',
])->group(function () {
    Route::post('/registerUser2', [RegisterController::class, 'register']);
});

