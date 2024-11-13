<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

    Route::get('/edit', function () {
        return view('produk.edit'); 
    })->name('produk.edit');
    
    Route::get('/list', function () {
        return view('produk.list'); 
    })->name('produk.list');
});

Route::get('/pesanan/show', function () {
    return view('pesanan.show'); 
})->name('pesanan.show');

Route::get('/auth', function () {
    return view('auth.login'); 
})->name('auth.login');



