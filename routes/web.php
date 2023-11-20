<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PendidikanController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerPost']);
    Route::get('/', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'loginPost']);
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Informasi
Route::get('info', [InfoController::class, 'index']);
Route::get('pembayaran', [InfoController::class, 'pembayaran']);
Route::post('postMetodeBayar', [InfoController::class, 'postMetodeBayar']);
Route::post('uploadBukti', [InfoController::class, 'uploadBukti']);
Route::get('infoTes', [InfoController::class, 'infoTes']);

// Data Calon Mahasiswa
Route::get('calon', [CalonController::class, 'index']);
Route::post('postCalon', [CalonController::class, 'store']);

// Data Pendidikan Terakhir
Route::get('pendidikan', [PendidikanController::class, 'index']);
Route::post('postPendidikan', [PendidikanController::class, 'postPendidikan']);

// Data Prodi\
// Route::get('prodi', [Prodi])
