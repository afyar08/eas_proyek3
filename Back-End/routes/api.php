<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TenanController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\BarangNotaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/nota', [NotaController::class, 'index']);
Route::get('/nota/{kodeNota}', [NotaController::class, 'show']);
Route::post('/nota', [NotaController::class, 'store']);
Route::put('/nota/{kodeNota}', [NotaController::class, 'update']);
Route::delete('/nota/{kodeNota}', [NotaController::class, 'destroy']);

Route::get('/tenan', [TenanController::class, 'index']);
Route::get('/tenan/{kodeTenan}', [TenanController::class, 'show']);
Route::post('/tenan', [TenanController::class, 'store']);
Route::put('/tenan/{kodeTenan}', [TenanController::class, 'update']);
Route::delete('/tenan/{kodeTenan}', [TenanController::class, 'destroy']);

Route::get('/kasir', [KasirController::class, 'index']);
Route::get('/kasir/{kodeKasir}', [KasirController::class, 'show']);
Route::post('/kasir', [KasirController::class, 'store']);
Route::put('/kasir/{kodeKasir}', [KasirController::class, 'update']);
Route::delete('/kasir/{kodeKasir}', [KasirController::class, 'destroy']);

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/{id}', [BarangController::class, 'show']);
Route::post('/barang', [BarangController::class, 'store']);
Route::put('/barang/{id}', [BarangController::class, 'update']);
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);

Route::get('/barang_nota', [BarangNotaController::class, 'index']);
Route::get('/barang_nota/{kodeNota}', [BarangNotaController::class, 'show']);
Route::post('/barang_nota', [BarangNotaController::class, 'store']);
Route::put('/barang_nota/{kodeNota}/{kodeBarang}', [BarangNotaController::class, 'update']);
Route::delete('/barang_nota/{kodeNota}/{kodeBarang}', [BarangNotaController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});