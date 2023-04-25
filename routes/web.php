<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\arsipController;
use App\Http\Controllers\PtugasMasukController;
use App\Http\Controllers\ptugasmasukcontroller as ControllersPtugasmasukcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

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

// route untuk Admin
route::get('/lihat', [AdminController::class, 'lihat']);
route::get('/tambah', [AdminController::class, 'create']);
route::get('/add_user', [AdminController::class, 'add_user']);
route::get('user/delete/{id}', [AdminController::class, 'delete']);
route::get('/edit/{id}', [AdminController::class, 'edit']);
route::get('/user/update', [AdminController::class, 'edit_user_aksi']);

// Route untuk Petugas pintu masuk dan petugas ruang
Route::get('/lihatdata', [Ptugasmasukcontroller::class, 'show']);
route::get('/add', [ControllersPtugasmasukcontroller::class, 'create']);
route::get('/tambah_data', [ControllersPtugasmasukcontroller::class, 'store']);
Route::get('/data/edit/{id}', [PtugasmasukController::class, 'edit']);
Route::get('data/update/{id}', [PtugasmasukController::class, 'update']);

// untuk petugas keluar
Route::get('/readout', [PtugasmasukController::class, 'pkeluar']);
Route::get('/out/{id}', [PtugasmasukController::class, 'out']);
Route::get('data/out/{id}', [PtugasmasukController::class, 'getout']);

// Route Pada Arsip data dan laporan keuangan
Route::get('/view_data', [arsipController::class, 'show']);
Route::get('/arsip', [ArsipController::class, 'show'])->name('arsip.show');
Route::get('/arsip/filter', [ArsipController::class, 'filter'])->name('arsip.filter');
Route::get('/rekapitulasi', [ArsipController::class, 'show']);

Auth::routes();
// route pada admin utama
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

