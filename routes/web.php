<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/news/{slug}', [HomeController::class, 'show'])->name('news.details');

Route::get('/category/{id}', [HomeController::class, 'category'])->name('category.news');

Route::get('/search', [HomeController::class, 'search'])->name('news.search');

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){

    Route::get('/dashboard',
    [DashboardController::class,'index'])
    ->name('dashboard');

    Route::resource('categories',CategoryController::class);

    Route::resource('news',NewsController::class);

});

require __DIR__.'/auth.php';
