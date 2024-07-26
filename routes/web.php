<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/autocomplete-search', [HomeController::class, 'search'])->name('front.search-product');

Route::get('/categories', [CategoryController::class, 'index'])->name('front.categories');
Route::get('/category/{category:slug}', [CategoryController::class, 'category'])->name('front.category');
Route::get('/autocomplete-search-category', [CategoryController::class, 'search'])->name('front.search-category');

Route::get('/product/{product:slug}', [ProductController::class, 'product_detail'])->name('front.product');
Route::get('/all-products', [ProductController::class, 'all_products'])->name('front.all-products');

Route::get('/cart', [CartController::class, 'index'])->name('front.cart');
Route::post('/add-to-cart/{product:slug}', [CartController::class, 'add'])->name('front.cart-add');
Route::delete('/cart/remove/{productSlug}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::patch('/cart/update/{productSlug}', [CartController::class, 'updateCart'])->name('cart.update');
Route::patch('/cart/update/{slug}', [CartController::class, 'updateQuantity']);
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


Route::get('/about', [AboutController::class, 'index'])->name('front.about');
