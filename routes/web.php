<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\FileuploadController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\InfopmbController;
use App\Http\Controllers\OrtuController;
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

// Data Info PMB
Route::get('info-pmb', [InfopmbController::class, 'index']);
Route::post('postInfopmb', [InfopmbController::class, 'store']);

// Data Orang Tua Siswa
Route::get('ortu', [OrtuController::class, 'index']);
Route::post('postOrtu', [OrtuController::class, 'store']);

// Data Upload Berkas
Route::get('upload', [FileuploadController::class, 'index']);
Route::post('postFoto', [FileuploadController::class, 'foto']);
Route::post('postAkta', [FileuploadController::class, 'akta']);
Route::post('postIjazah', [FileuploadController::class, 'ijazah']);
Route::post('postKk', [FileuploadController::class, 'kk']);
Route::post('postKtp', [FileuploadController::class, 'ktp']);
Route::post('postSkck', [FileuploadController::class, 'skck']);
Route::post('postSkkb', [FileuploadController::class, 'skkb']);
Route::post('postSkl', [FileuploadController::class, 'skl']);
