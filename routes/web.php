<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Models\Menu;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

// ==========================================
// GUEST / HALAMAN UTAMA PENGUNJUNG
// ==========================================
Route::get('/', function () {
    $menus = Menu::all();

    return view('guest.index', compact('menus'));
})->name('guest.home');

// ==========================================
// ROUTE MAHASISWA
// ==========================================
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

// ==========================================
// ROUTE HALAMAN DAN MATAKULIAH
// ==========================================
Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/matakuliah', [MatakuliahController::class, 'index']);
Route::get('/matakuliah/create', [MatakuliahController::class, 'create']);
Route::post('/matakuliah', [MatakuliahController::class, 'store']);
Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);
Route::get('/matakuliah/edit/{kode}', [MatakuliahController::class, 'edit']);
Route::put('/matakuliah/{kode}', [MatakuliahController::class, 'update']);
Route::delete('/matakuliah/{kode}', [MatakuliahController::class, 'destroy']);
Route::get('/home', [HomeController::class, 'index']);

// ==========================================
// QUESTION
// ==========================================
Route::post('/question/store', [QuestionController::class, 'store'])
    ->name('question.store');

// ==========================================
// DASHBOARD ADMIN
// ==========================================
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// ==========================================
// CRUD MENU, PELANGGAN, PESANAN
// ==========================================
Route::resource('menu', MenuController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('pesanan', PesananController::class);
