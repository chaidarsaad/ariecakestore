<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Admin\SpendingController;
use App\Http\Controllers\Admin\PosController;
use App\Http\Controllers\Admin\StokbahanController;
use App\Http\Controllers\Admin\ResepController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('category', [FrontendController::class, 'category']);
Route::get('category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Route::get('product-list', [FrontendController::class, 'productlistAjax']);
Route::post('searchproduct',[FrontendController::class, 'searchProduct']);

Auth::routes();

Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wislist-count', [WishlistController::class, 'wishlistcount']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::get('my-profile', [UserController::class, 'user']);
    Route::get('edit-profile', [UserController::class, 'edit']);
    Route::put('update-profile/{id}', [UserController::class, 'update']);

    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);

    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::post('midtranspayment', [CheckoutController::class, 'midtrans']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class ,'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('districts', [DistrictController::class, 'index']);
    Route::get('add-districts', [DistrictController::class, 'add']);
    Route::post('insert-district', [DistrictController::class, 'insert']);
    Route::get('edit-district/{id}', [DistrictController::class, 'edit']);
    Route::put('update-district/{id}', [DistrictController::class, 'update']);
    Route::get('delete-district/{id}', [DistrictController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('edit-user/{id}', [DashboardController::class, 'edit']);
    Route::put('update-user/{id}', [DashboardController::class, 'update']);
    Route::get('delete-user/{id}', [DashboardController::class, 'destroy']);

    Route::get('spendings', [SpendingController::class, 'index']);
    Route::get('add-spendings', [SpendingController::class, 'add']);
    Route::post('insert-spending', [SpendingController::class, 'insert']);
    Route::get('edit-spending/{id}', [SpendingController::class, 'edit']);
    Route::put('update-spending/{id}', [SpendingController::class, 'update']);
    Route::get('delete-spending/{id}', [SpendingController::class, 'destroy']);

    Route::get('pointofsales', [PosController::class, 'index']);
    Route::post('insert-pointofsale/{id}', [PosController::class, 'insert']);
    Route::put('update-pointofsale/{id}', [PosController::class, 'update']);
    Route::post('hitung-pointofsale', [PosController::class, 'hitung']);
    Route::get('delete-pointofsale/{id}', [PosController::class, 'deletepos']);

    Route::get('resep', [ResepController::class, 'index']);
    Route::get('add-resep', [ResepController::class, 'add']);
    Route::post('insert-resep', [ResepController::class, 'insert']);
    Route::get('edit-resep/{id}', [ResepController::class, 'edit']);
    Route::put('update-resep/{id}', [ResepController::class, 'update']);
    Route::get('delete-resep/{id}', [ResepController::class, 'destroy']);

    Route::get('stokbahan', [StokbahanController::class, 'index']);
    Route::get('add-stokbahan', [StokbahanController::class, 'add']);
    Route::post('insert-stokbahan', [StokbahanController::class, 'insert']);
    Route::get('edit-stokbahan/{id}', [StokbahanController::class, 'edit']);
    Route::put('update-stokbahan/{id}', [StokbahanController::class, 'update']);
    Route::get('delete-stokbahan/{id}', [StokbahanController::class, 'destroy']);
});