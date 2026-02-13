<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

Route::get('/',[TransaksiController::class,'index'])->name('Transaksi.index');
Route::get('/TambahTransaksi',[TransaksiController::class,'create'])->name('Transaksi.create');
Route::post('/Store',[TransaksiController::class,'store'])->name('Transaksi.store');
Route::get('/DataTransaksi',[TransaksiController::class,'history'])->name('Transaksi.history');