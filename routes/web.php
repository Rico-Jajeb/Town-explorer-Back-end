<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


use App\Http\Controllers\Auth\LoginController;
Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'web',
    EnsureFrontendRequestsAreStateful::class,
])->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
});

