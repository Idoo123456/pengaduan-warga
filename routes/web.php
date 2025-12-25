<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| HOME (WARGA)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('warga.home');
})->name('home');

/*
|--------------------------------------------------------------------------
| PENGADUAN (GUEST)
|--------------------------------------------------------------------------
*/
Route::get('/pengaduan', [PengaduanController::class, 'create'])
    ->name('pengaduan.create');

Route::post('/pengaduan', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');

/*
|--------------------------------------------------------------------------
| TENTANG
|--------------------------------------------------------------------------
*/
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN & LOGOUT)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'loginProcess'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD (AUTH REQUIRED - CUSTOM SESSION)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {

    // 🔐 CEK LOGIN
    if (!session()->has('user')) {
        return redirect()->route('login')
            ->with('error', 'Silakan login terlebih dahulu.');
    }

    return view('dashboard.index');

})->name('dashboard');

/*
|--------------------------------------------------------------------------
| USER MANAGEMENT (OPTIONAL PROTECTED)
|--------------------------------------------------------------------------
*/
Route::get('/user', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return app(UserController::class)->index();
})->name('user.index');

Route::get('/user/create', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return app(UserController::class)->create();
})->name('user.create');

Route::post('/user', [UserController::class, 'store'])
    ->name('user.store');
