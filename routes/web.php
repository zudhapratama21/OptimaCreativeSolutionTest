<?php


use Illuminate\Support\Facades\Route;



Route::resource('service', 'App\Http\Controllers\ServiceController'); 
Route::resource('award', 'App\Http\Controllers\AwardController'); 
Route::resource('product', 'App\Http\Controllers\ProductController'); 
Route::POST('/product/{product}/uploadFotoProduk', [App\Http\Controllers\ProductController::class, 'uploadFotoProduk'])->name('produk.upload');
Route::DELETE('/product/{fotoProduk}/deleteFoto', [App\Http\Controllers\ProductController::class, 'deleteFotoProduk'])->name('produk.delete');
Route::resource('article', 'App\Http\Controllers\ArticleController'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
