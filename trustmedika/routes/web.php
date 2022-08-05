<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/pegawai', [PegawaiController::class, 'show']);
Route::post('/pegawai/add', [PegawaiController::class, 'add']);
Route::post('/pegawai/edit', [PegawaiController::class, 'edit']);
Route::post('/pegawai/delete', [PegawaiController::class, 'delete']);

Route::get('/poli', [PoliController::class, 'show']);
Route::post('/poli/add', [PoliController::class, 'add']);
Route::post('/poli/edit', [PoliController::class, 'edit']);
Route::post('/poli/delete', [PoliController::class, 'delete']);

Route::get('/jadwal', [JadwalController::class, 'show']);
Route::post('/jadwal/add', [JadwalController::class, 'add']);
Route::post('/jadwal/delete', [JadwalController::class, 'delete']);
Route::get('/jadwal/download', [JadwalController::class, 'download']);