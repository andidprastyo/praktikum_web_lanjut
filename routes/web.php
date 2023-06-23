<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswas.index');
Route::resource('mahasiswas', MahasiswaController::class);
Route::get('/mahasiswas/detail/{Nim}', [MahasiswaController::class, 'detail'])->name('mahasiswas.detail');