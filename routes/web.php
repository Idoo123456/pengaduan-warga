<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
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
| LOGIN (sementara)
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
