<?php

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

use Modules\Simpang5\Http\Controllers\DataLaluLintasController;
use Modules\Simpang5\Http\Controllers\FormatDataController;
use Modules\Simpang5\Http\Controllers\IdentifikasiController;
use Modules\Simpang5\Http\Controllers\Simpang5Controller;

Route::prefix('simpang5')->group(function () {
    Route::get('/', [Simpang5Controller::class, 'index']);
    Route::prefix('/data-simpang')->group(function () {
        Route::get('/', [Simpang5Controller::class, 'index']);
        Route::get('/tambah', [Simpang5Controller::class, 'create']);
        Route::post('/simpan', [Simpang5Controller::class, 'store']);
        Route::get('/show/{id}', [Simpang5Controller::class, 'show']);
        Route::get('/edit/{id}', [Simpang5Controller::class, 'edit']);
        Route::post('/update/{id}', [Simpang5Controller::class, 'update']);
        Route::get('/hapus/{id}', [Simpang5Controller::class, 'destroy']);
    });

    Route::prefix('/format-data')->group(function () {
        Route::get('/', [FormatDataController::class, 'index']);
        Route::get('/preview', [FormatDataController::class, 'preview']);
        Route::get('/excelExport', [FormatDataController::class, 'excelExport']);
    });

    Route::prefix('/data-lalu-lintas')->group(function () {
        Route::get('/', [DataLaluLintasController::class, 'index']);
        Route::get('/tambah', [DataLaluLintasController::class, 'create']);
        Route::post('/preview', [DataLaluLintasController::class, 'show']);
        Route::post('/simpan', [DataLaluLintasController::class, 'store']);
        Route::get('/hapus/{id}', [DataLaluLintasController::class, 'destroy']);
        Route::prefix('/identifikasi')->group(function () {
            Route::get('/', [IdentifikasiController::class, 'index']);
            Route::get('/kendaraan-per-jam/{id}', [IdentifikasiController::class, 'kendaraan_per_jam']);
            Route::get('/smp-per-jam/{id}', [IdentifikasiController::class, 'smp_per_jam']);
            Route::get('/fluktasi-lalu-lintas/{id}', [IdentifikasiController::class, 'fluktasi_lalu_lintas']);
            Route::get('/komposisi-kendaraan/{id}', [IdentifikasiController::class, 'komposisi_kendaraan']);
            Route::get('/komposisi-pergerakan/{id}', [IdentifikasiController::class, 'komposisi_pergerakan']);
            Route::get('/jam-puncak/{id}', [IdentifikasiController::class, 'jam_puncak']);
        });
    });
});
