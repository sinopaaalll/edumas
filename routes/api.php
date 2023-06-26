<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KategoriController as ApiKategoriController;
use App\Http\Controllers\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/kategori', [ApiKategoriController::class, 'index']);
Route::get('/kategori/{id}', [ApiKategoriController::class, 'show']);
Route::post('/kategori-create', [ApiKategoriController::class, 'store']);
Route::put('/kategori/{id}', [ApiKategoriController::class, 'update']);
Route::delete('/kategori/{id}', [ApiKategoriController::class, 'destroy']);
