<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('pages.home'))->name('home');
Route::get('/tentang', fn () => view('pages.tentang'))->name('tentang');
Route::get('/kontak', fn () => view('pages.kontak'))->name('kontak');

/*
|--------------------------------------------------------------------------
| DEVELOPER
|--------------------------------------------------------------------------
*/
Route::get('/developer', fn () => view('pages.developer'))->name('developer');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PENGADUAN (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::resource('pengaduan', PengaduanController::class);
});
