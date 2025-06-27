<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('registration.create');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registration', [App\Http\Controllers\RegistrationController::class, 'create'])->name('registration.create');
Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'store'])->name('registration.store');
Route::get('registration/{registration}/show', [App\Http\Controllers\RegistrationController::class, 'show'])->name('registration.show');

Route::get('registration/{registration}/email', [App\Http\Controllers\RegistrationController::class, 'email'])->name('registration.email');
Route::get('registration/{registration}/email/admin', [App\Http\Controllers\RegistrationController::class, 'adminEmail'])->name('registration.admin.email');

Route::post('create-order', [App\Http\Controllers\NabilController::class, 'createOrder'])->name('payment.nabil.createOrder');
