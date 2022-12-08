<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('user.home');

Route::middleware(['auth'])->group(function() {

    Route::middleware(['IsUser'])->group( function() {
        Route::get('/book-tiket', 'TiketController@index')->name('user.tiket');
        Route::post('/cekHarga', 'TiketController@cekHarga')->name('user.tiket.cekHarga');
        Route::post('/pesanTiket', 'TiketController@pesanTiket')->name('user.tiket.pesanTiket');

        Route::get('/pesanan', 'PesananController@index')->name('user.pesanan');
        Route::put('/pesanan/uploadBukti/{id}', 'PesananController@uploadBukti')->name('user.pesanan.uploadBukti');
        Route::put('/pesanan/batal/{id}', 'PesananController@batal')->name('user.pesanan.batal');
        Route::put('/pesanan/selesai/{id}', 'PesananController@selesai')->name('user.pesanan.selesai');
    });

    Route::name('admin.')->middleware(['IsAdmin'])->prefix('admin')->group(function() {
    
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
        
        Route::get('/transaksi', 'Admin\TransaksiController@index')->name('transaksi.index');
        Route::put('/transaksi/batal/{id}', 'Admin\TransaksiController@batal')->name('transaksi.batal');
        Route::put('/transaksi/konfirmasi/{id}', 'Admin\TransaksiController@konfirmasi')->name('transaksi.konfirmasi');
        Route::put('/transaksi/kirim/{id}', 'Admin\TransaksiController@kirim')->name('transaksi.kirim');
        Route::put('/transaksi/selesai/{id}', 'Admin\TransaksiController@selesai')->name('transaksi.selesai');
        
        Route::get('/gallery', 'Admin\MasterGalleryController@index')->name('gallery.index');
        Route::get('/gallery/create', 'Admin\MasterGalleryController@create')->name('gallery.create');
        Route::get('/gallery/edit/{id}', 'Admin\MasterGalleryController@edit')->name('gallery.edit');
        Route::post('/gallery/store', 'Admin\MasterGalleryController@store')->name('gallery.store');
        Route::put('/gallery/update/{id}', 'Admin\MasterGalleryController@update')->name('gallery.update');
        Route::delete('/gallery/destroy/{id}', 'Admin\MasterGalleryController@destroy')->name('gallery.destroy');

        Route::get('/about', 'Admin\MasterAboutController@index')->name('about.index');
        Route::get('/about/edit/{id}', 'Admin\MasterAboutController@edit')->name('about.edit');
        Route::put('/about/update/{id}', 'Admin\MasterAboutController@update')->name('about.update');

        Route::get('/pelanggan', 'Admin\PelangganController@index')->name('pelanggan.index');
        Route::delete('/pelanggan/destroy/{id}', 'Admin\PelangganController@destroy')->name('pelanggan.destroy');
    });
});