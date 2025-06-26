<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::any('payment-response', [App\Http\Controllers\NabilController::class, 'paymentResponse'])->name('payment.nabil.response');
Route::post('get-order-status', [App\Http\Controllers\NabilController::class, 'getOrderStatus'])->name('payment.nabil.getOrder');
