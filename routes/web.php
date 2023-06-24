<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;

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

// mahasiswa
Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswas.index');
Route::resource('mahasiswas', MahasiswaController::class);
Route::get('/mahasiswas/{Nim}/khs', [MahasiswaController::class, 'khs'])->name('mahasiswas.khs');
Route::get('/mahasiswas/{Nim}/nilai', [MahasiswaController::class, 'nilai'])->name('mahasiswas.nilai');

// artikel
Route::resource('articles', ArticleController::class);

// report
Route::get('/article/cetak_pdf', [ArticleController::class, 'cetak_pdf']);