<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\TraditionsController;
use App\Http\Controllers\CompletedTraditionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/traditionList', [TraditionsController::class, 'index'])->name('traditionList');
Route::post('/traditionList', [TraditionsController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/completedTraditions', [CompletedTraditionsController::class, 'index'])->name('completedTraditions');
Route::post('/completedTraditions', [CompletedTraditionsController::class, 'store']);
