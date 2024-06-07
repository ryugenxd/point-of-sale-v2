<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'index'],'index')->name('login');
Route::post('/auth',[LoginController::class,'auth'],'auth')->name('login.auth');

Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','index')->name('dashboard');
    });
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});

