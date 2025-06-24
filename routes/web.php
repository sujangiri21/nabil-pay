<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('registration.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/table', function () {
    return view('components.size.culture-dress-f');
});

Route::get('/registration', [App\Http\Controllers\RegistrationController::class, 'create'])->name('registration.create');
Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'store'])->name('registration.store');
Route::get('registration/{registration}/show', [App\Http\Controllers\RegistrationController::class, 'show'])->name('registration.show');

Route::post('create-order', [App\Http\Controllers\NabilController::class, 'createOrder'])->name('payment.nabil.createOrder');
