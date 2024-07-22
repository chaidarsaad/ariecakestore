<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/categories', [CategoryController::class, 'index'])->name('front.categories');
Route::get('/category/{category:slug}', [CategoryController::class, 'category'])->name('front.category');

Route::get('/cart', [CartController::class, 'index'])->name('front.cart');
