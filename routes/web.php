<?php


use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware(["auth"])->group(function() {
    Route::resource('/', 'App\Http\Controllers\CompanyController');       
    Route::resource('company', 'App\Http\Controllers\CompanyController');       
    Route::resource('employee', 'App\Http\Controllers\EmployeeController');                
});



