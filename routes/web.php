<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\admin\SlideshowController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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

//Route Bagian Depan

Auth::routes();

Auth::routes(['verify' => true]);



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomepageController::class, 'index'])->name('home.index');

Route::get('/about', [HomepageController::class, 'about'])->name('home.about');
Route::get('/kontak', [HomepageController::class, 'kontak'])->name('home.kontak');
Route::get('/kategori', [HomepageController::class, 'kategori'])->name('home.kategori');
Route::get('/kategori/{slug}', [HomepageController::class, 'kategoribyslug'])->name('home.kategoribyslug');
Route::get('/produkDetail/{slug}', [HomepageController::class, 'produkDetail'])->name('home.produkDetail');

Route::middleware(['auth', 'role:member'])->group(function () {
    Route::resource('cart', CartController::class);
    Route::patch('/kosongkan/{id}', [CartController::class, 'kosongkan']);
    Route::resource('cartdetail', CartDetailController::class);
});
// Route::get('/dashboard', function ()
//     {
//     return view('layouts.dashboard');
//     }
// );

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        //Route Kategori
        Route::resource('kategori', KategoriController::class);
        Route::get('/cari-kategori', [KategoriController::class, 'cari'])->name('kategori.cari');
        //Route Produk
        route::resource('produk', ProdukController::class);
        route::get('/cari-produk', [ProdukController::class, 'cari'])->name('produk.cari');
        route::post('/foto-produk', [ProdukController::class, 'store_foto'])->name('produk.store_foto');
        route::delete('/foto-produk/{id}', [ProdukController::class, 'destroy_foto'])->name('produk.destroy_foto');
        //Route Customer
        route::resource('customer', CustomerController::class);
        //Route Transaksi
        route::resource('transaksi', TransaksiController::class);
        //Route Profil
        route::get('/profil', [UserController::class, 'index'])->name('profil.index');
        //Route Setting Profil
        route::get('/setting', [UserController::class, 'setting'])->name('profil.setting');
        //Route Slideshow
        route::resource('slideshow', SlideshowController::class);
        //Route Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        //Route Proses Laporan
        Route::get('/proseslaporan', [LaporanController::class, 'proses'])->name('laporan.proses');
    });
});
