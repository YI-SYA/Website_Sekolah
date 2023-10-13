<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\InformasiController;
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
    return redirect('dashboard');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update']);
    Route::get('/siswa/{id}/delete', [SiswaController::class, 'delete']);
    Route::get('/siswa/{id}/profile', [SiswaController::class, 'profile']);
    Route::get('/siswa/export-excel', [SiswaController::class, 'exportExcel']);
    Route::get('/siswa/export-pdf', [SiswaController::class, 'exportPdf']);
    Route::get('/siswa/pdf', [SiswaController::class, 'pdf']);
    Route::post('/siswa/{id}/addnilai', [SiswaController::class, 'addnilai']);

    Route::get('/mapel', [MapelController::class, 'index']);
    Route::post('/mapel/create', [MapelController::class, 'create']);
    Route::get('/mapel/{id}/edit', [MapelController::class, 'edit']);
    Route::post('/mapel/{id}/update', [MapelController::class, 'update']);
    Route::get('/mapel/{id}/delete', [MapelController::class, 'delete']);

    Route::get('/informasi',[InformasiController::class, 'index']);
    Route::post('/informasi/create', [InformasiController::class, 'create']);
    Route::get('/informasi/{id}/edit', [InformasiController::class, 'edit']);
    Route::post('/informasi/{id}/update', [InformasiController::class, 'update']);
    Route::get('/informasi/{id}/delete', [InformasiController::class, 'delete']);

});


