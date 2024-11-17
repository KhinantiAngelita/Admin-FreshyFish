<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('auth.login');

    Route::get('/create', function () {
        return view('auth.create');
    })->name('auth.create');
});


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::get('/toko', function () {
    return view('toko.index');
})->name('toko.index');

Route::prefix('produk')->group(function () {

    Route::get('/show', function () {
        return view('produk.show');
    })->name('produk.show');

    Route::get('/create', function () {
        return view('produk.create');
    })->name('produk.create');

    // Route::get('/edit', function () {
    //     return view('produk.edit');
    // })->name('produk.edit');


    Route::get('/list', function () {
        return view('produk.list');
    })->name('produk.list');
});

Route::get('/pesanan/show', function () {
    return view('pesanan.show');
})->name('pesanan.show');

// Route untuk halaman edit produk berdasarkan ID
Route::get('/produk/edit/{id}', function ($id) {
    return view('produk.edit', ['id' => $id]);
})->name('produk.edit');






