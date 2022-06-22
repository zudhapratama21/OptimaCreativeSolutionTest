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

Route::get('/', function () {
    return view('admin.service.index');
});

Route::get('/service', function () {
    return view('admin.service.index');
});

Route::get('/product', function () {
    return view('admin.product.index');
});

Route::get('/product/create', function () {
    return view('admin.product.create');
});

Route::get('/award', function () {
    return view('admin.award.index');
});

Route::get('/award/create', function () {
    return view('admin.award.create');
});

Route::get('/article', function () {
    return view('admin.article.index');
});

Route::get('/article/create', function () {
    return view('admin.article.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
