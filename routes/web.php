<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'index'],'index')->name('login');
Route::post('/auth',[LoginController::class,'auth'],'auth')->name('login.auth');

Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','index')->name('dashboard');
    });


    Route::controller(GoodsController::class)->prefix('/goods')->group(function(){
        Route::get('/','index')->name('goods');
    });

    Route::controller(TypeController::class)->prefix('/goods/types')->group(function(){
        Route::get('/','index')->name('goods.types');
        Route::get('/tabel','tabel')->name('types.tabel');
        Route::post('/save','save')->name('types.save');
        Route::get('/detail/{id}','detail')->name('types.detail')->where('id','[0-9]+');
        Route::put('/update/{id}','update')->name('types.update')->where('id','[0-9]+');
        Route::delete('/delete/{id}','delete')->name('types.delete')->where('id','[0-9]+');
    });

    Route::controller(BrandController::class)->prefix('/goods/brands')->group(function(){
        Route::get('/','index')->name('goods.brands');
        Route::get('/tabel','tabel')->name('brands.tabel');
        Route::post('/save','save')->name('brands.save');
        Route::get('/detail/{id}','detail')->name('brands.detail')->where('id','[0-9]+');
        Route::put('/update/{id}','update')->name('brands.update')->where('id','[0-9]+');
        Route::delete('/delete/{id}','delete')->name('brands.delete')->where('id','[0-9]+');
    });

    Route::controller(UnitController::class)->prefix('/goods/units')->group(function(){
        Route::get('/','index')->name('goods.units');

    });

    Route::controller(CustomerController::class)->prefix('/customers')->group(function(){
        Route::get('/','index')->name('customers');
        Route::get('/tabel','tabel')->name('customers.tabel');
        Route::post('/save','save')->name('customers.save');
        Route::get('/detail/{id}','detail')->name('customers.detail')->where('id','[0-9]+');
        Route::put('/update/{id}','update')->name('customers.update')->where('id','[0-9]+');
        Route::delete('/delete/{id}','delete')->name('customers.delete')->where('id','[0-9]+');
    });

    Route::controller(SupplierController::class)->prefix('/suppliers')->group(function(){
        Route::get('/','index')->name('suppliers');
        Route::get('/tabel','tabel')->name('suppliers.tabel');
        Route::post('/save','save')->name('suppliers.save');
        Route::get('/detail/{id}','detail')->name('suppliers.detail')->where('id','[0-9]+');
        Route::put('/update/{id}','update')->name('suppliers.update')->where('id','[0-9]+');
        Route::delete('/delete/{id}','delete')->name('suppliers.delete')->where('id','[0-9]+');
    });

    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});

