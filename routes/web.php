<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'index'],'index')->name('login');
Route::post('/auth',[LoginController::class,'auth'],'auth')->name('login.auth');

Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','index')->name('dashboard');
    });

    Route::controller(CustomerController::class)->prefix('/customers')->group(function(){
        Route::get('/','index')->name('customers');
        Route::get('/tabel','tabel')->name('customers.tabel');
        // Route::middleware([''])->group(function(){
            Route::post('/save','save')->name('customers.save');
            Route::get('/detail/{id}','detail')->name('customers.detail')->where('id','[0-9]+');
            Route::put('/update/{id}','update')->name('customers.update')->where('id','[0-9]+');
            Route::delete('/delete/{id}','delete')->name('customers.delete')->where('id','[0-9]+');
        // });
    });

    Route::get('/suppliers',function(){
        return view('suppliers');
    });

    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});

