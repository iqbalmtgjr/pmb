<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('layouts.master');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerPost'])->name('register-post');
    Route::get('/', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'loginPost'])->name('login-post');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('info', [InfoController::class, 'index']);
