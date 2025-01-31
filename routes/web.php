<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('pages.home');
// })->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('lomba', LombaController::class)->middleware('auth');
// Route::resource('peserta', PesertaController::class)->middleware('auth');
Route::resource('penilaian', PenilaianController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::post('/peserta', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('/peserta/{peserta}', [PesertaController::class, 'show'])->name('peserta.show');
    Route::get('/peserta/{peserta}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('/peserta/{peserta}', [PesertaController::class, 'update'])->name('peserta.update');
    Route::delete('/peserta/{peserta}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
});