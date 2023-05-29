<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('landingpage.index');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('users', PetugasController::class);
Route::resource('masyarakats', MasyarakatController::class);