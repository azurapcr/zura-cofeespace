<?php

use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;

// Halaman utama guest
Route::get('/', function () {
    $menus = Menu::all();

    return view('guest.index', compact('menus'));
})->name('guest.home');

// Dashboard admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// CRUD data admin
Route::resource('menu', MenuController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('pesanan', PesananController::class);
Route::resource('users', UserController::class);

// Pemesanan dari halaman guest
Route::get('/pesan/{menu}', [PesananController::class, 'formGuest'])
    ->name('guest.order.create');

Route::post('/pesan', [PesananController::class, 'storeGuest'])
    ->name('guest.order.store');

// Keranjang guest
Route::post('/keranjang', [PesananController::class, 'simpanKeranjang'])
    ->name('guest.cart.store');

// Checkout guest
Route::get('/checkout', [PesananController::class, 'checkout'])
    ->name('guest.checkout');

Route::post('/checkout', [PesananController::class, 'storeCheckout'])
    ->name('guest.checkout.store');
