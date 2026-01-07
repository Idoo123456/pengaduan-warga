<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| GUEST ONLY (BELUM LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'loginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'loginProcess'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'registerForm'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'registerProcess'])
        ->name('register.process');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /* ===== HOME & STATIC ===== */
    Route::get('/', fn() => view('pages.home'))->name('home');
    Route::get('/home', fn() => view('pages.home'));
    Route::get('/tentang', fn() => view('pages.tentang'))->name('tentang');
    Route::get('/kontak', fn() => view('pages.kontak'))->name('kontak');
    Route::get('/developer', fn() => view('pages.developer'))->name('developer');

    /* ===== LOGOUT ===== */
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    /* =====================================================
     | PENGADUAN (URUTAN WAJIB SEPERTI INI)
     ===================================================== */

    // 🔥 RIWAYAT (HARUS DI ATAS RESOURCE)
    Route::get('/pengaduan/riwayat', [PengaduanController::class, 'riwayat'])
        ->name('pengaduan.riwayat');

    // 🔥 RATING
    Route::post('/pengaduan/{pengaduan}/rating', [PengaduanController::class, 'submitRating'])
        ->name('pengaduan.rating');

    // 🔥 RESOURCE (PALING BAWAH)
    Route::resource('pengaduan', PengaduanController::class);

    /* ===== PROFILE ===== */
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/profile/password', [ProfileController::class, 'password'])
        ->name('profile.password');

    Route::post('/profile/password', [ProfileController::class, 'passwordUpdate'])
        ->name('profile.password.update');
});
