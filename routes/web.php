<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
