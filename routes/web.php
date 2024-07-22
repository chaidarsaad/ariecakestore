<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('front.home');

Route::get('/categories', [CategoryController::class, 'index'])->name('front.categories');
Route::get('/category/{category:slug}', [CategoryController::class, 'category'])->name('front.category');

Route::get('/product/{product:id}', [ProductController::class, 'product_detail'])->name('front.product');

Route::get('/cart', [CartController::class, 'index'])->name('front.cart');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('front.wishlist');

Route::get('/about', [AboutController::class, 'index'])->name('front.about');
