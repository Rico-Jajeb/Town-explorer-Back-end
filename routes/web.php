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



// Route::middleware([
//     'web',
//     EnsureFrontendRequestsAreStateful::class,
// ])->group(function () {
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });
// });




// Route::middleware([
//     EnsureFrontendRequestsAreStateful::class,
//     'auth:sanctum',
//     'web',
// ])->get('/user2', function (Request $request) {
//     return response()->json($request->user());
// });


// Route::post('/login2', [LoginController::class, 'login']);

// Route::middleware([
//     \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
//     'web'
// ])->group(function () {
//     Route::post('/login2', [LoginController::class, 'login']);
// });


// Route::middleware([
//    EnsureFrontendRequestsAreStateful::class,
//     'web' // session support!
// ])->group(function () {
//     Route::post('/login', [LoginController::class, 'login']);
// });
