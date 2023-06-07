<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\MasyarakatController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Route::middleware('guest')->group(function () {
    // Route yang dapat diakses oleh pengguna yang belum login
    Route::get('/', function () {
        return view('landingpage.index');
    });
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    // Route yang memerlukan otentikasi (login) sebelum mengaksesnya
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', PetugasController::class);
    Route::resource('masyarakats', MasyarakatController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('pengaduans', PengaduanController::class);
    Route::post('tanggapans', [TanggapanController::class, 'tanggapan'])->name('tanggapans');
    Route::post('tanggapans/{pengaduan_id}', [TanggapanController::class, 'tanggapanSelesai'])->name('tanggapans.selesai');

});
