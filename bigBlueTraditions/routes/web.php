<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\TraditionsController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\UKFactsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\PrizesController;
use App\Http\Controllers\CompletedTraditionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/userInfo', function () {
    return view('userInfo', [
        'completedTraditions' => collect()
    ]);
})->name('userInfo');

Route::get('/traditionList', [TraditionsController::class, 'index'])->name('traditionList');
Route::post('/traditionList', [TraditionsController::class, 'store']);

Route::get('/resourceList', [ResourceController::class, 'index'])->name('resourceList');
Route::post('/resourceList', [ResourceController::class, 'store']);

Route::get('/ukFactsList', [UKFactsController::class, 'index'])->name('ukFactsList');
Route::post('/ukFactsList', [UKFactsController::class, 'store']);

Route::get('/couponList', [CouponsController::class, 'index'])->name('couponList');
Route::post('/couponList', [CouponsController::class, 'store']);

Route::get('/prizeList', [PrizesController::class, 'index'])->name('prizeList');
Route::post('/prizeList', [PrizesController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/completedTraditions', [CompletedTraditionsController::class, 'index'])->name('completedTraditions');
Route::post('/completedTraditions', [CompletedTraditionsController::class, 'store']);
