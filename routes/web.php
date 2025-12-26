<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HOME (GUEST)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('pages.home');
})->name('home');

/*
|--------------------------------------------------------------------------
| PENGADUAN (GUEST)
|--------------------------------------------------------------------------
*/
Route::get('/pengaduan', function () {
    return view('pengaduan.form');
})->name('pengaduan.create');

Route::post('/pengaduan', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');

/*
|--------------------------------------------------------------------------
| TENTANG (GUEST)
|--------------------------------------------------------------------------
*/
Route::get('/tentang', function () {
    return view('pages.tentang.index');
})->name('tentang');

Route::get('/tentang/website', function () {
    return view('pages.tentang.website');
})->name('tentang.website');

Route::get('/tentang/saya', function () {
    return view('pages.tentang.saya');
})->name('tentang.saya');

Route::get('/tentang/kontak', function () {
    return view('pages.tentang.kontak');
})->name('tentang.kontak');

/*
|--------------------------------------------------------------------------
| AUTH
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
| DASHBOARD (ADMIN)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {

    if (! session()->has('user')) {
        return redirect()->route('login')
            ->with('error', 'Silakan login terlebih dahulu.');
    }

    return view('dashboard.index');

})->name('dashboard');

/*
|--------------------------------------------------------------------------
| USER MANAGEMENT
|--------------------------------------------------------------------------
*/
Route::get('/user', function () {
    if (! session()->has('user')) {
        return redirect()->route('login');
    }
    return app(UserController::class)->index();
})->name('user.index');

Route::get('/user/create', function () {
    if (! session()->has('user')) {
        return redirect()->route('login');
    }
    return app(UserController::class)->create();
})->name('user.create');

Route::post('/user', [UserController::class, 'store'])
    ->name('user.store');
