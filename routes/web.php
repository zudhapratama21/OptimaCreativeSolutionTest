<?php


use Illuminate\Support\Facades\Route;





Auth::routes();
Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('service', 'App\Http\Controllers\ServiceController');

        Route::resource('award', 'App\Http\Controllers\AwardController'); 
        Route::POST('/award/{award}/uploadFoto', [App\Http\Controllers\AwardController::class, 'uploadFotoAward'])->name('award.uploadFoto');
        Route::DELETE('/award/{awardFoto}/deleteFoto', [App\Http\Controllers\AwardController::class, 'deleteFotoAward'])->name('award.deleteFoto');

        Route::resource('product', 'App\Http\Controllers\ProductController'); 
        Route::POST('/product/{product}/uploadFotoProduk', [App\Http\Controllers\ProductController::class, 'uploadFotoProduk'])->name('produk.upload');
        Route::DELETE('/product/{fotoProduk}/deleteFoto', [App\Http\Controllers\ProductController::class, 'deleteFotoProduk'])->name('produk.delete');

        Route::resource('article', 'App\Http\Controllers\ArticleController'); 
        Route::POST('/article/{article}/uploadFoto', [App\Http\Controllers\ArticleController::class, 'uploadFotoArticle'])->name('article.uploadFoto');
        Route::DELETE('/article/{articleFoto}/deleteFoto', [App\Http\Controllers\ArticleController::class, 'deleteFotoArticle'])->name('article.deleteFoto');

        Route::resource('mediasosial', 'App\Http\Controllers\MediaSosialController'); 

        Route::GET('/profile',[App\Http\Controllers\UserController::class, 'index']);
        Route::PUT('/profile',[App\Http\Controllers\UserController::class, 'update'])->name('profile.update');


       
});



