<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExternalApiController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('posts', PostController::class);

    // call a 3rd party api route
    Route::get('/external-posts', [ExternalApiController::class, 'index']);
    // save for the 3rd party api route
    Route::post('/external-posts/save', [ExternalApiController::class, 'postsave']);

    // payment gateway
    Route::post('/payment/initiate', [PaymentController::class, 'initiate']);

    Route::post('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::post('/payment/fail', [PaymentController::class, 'fail'])->name('payment.fail');
    Route::post('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
});
