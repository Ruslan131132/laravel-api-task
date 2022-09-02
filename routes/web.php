<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');
Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save'])->name('registration');

Route::middleware('auth_api')->get('/api/quotation/{date}', [\App\Http\Controllers\QuotesController::class, 'get']);

Route::name('token.')->group(function () {
    Route::post('/generate', [\App\Http\Controllers\TokenController::class, 'generate'])->name('generate');
});
