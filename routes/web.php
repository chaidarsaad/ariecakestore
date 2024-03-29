<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CekongkirController;

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SpendingController;
use App\Http\Controllers\Admin\PosController;
use App\Http\Controllers\Admin\StokbahanController;
use App\Http\Controllers\Admin\ResepController;

use App\Http\Controllers\Karyawan\OrderkController;
use App\Http\Controllers\Karyawan\ProductkController;
use App\Http\Controllers\Karyawan\CategorykController;
use App\Http\Controllers\Karyawan\DistrictkController;
use App\Http\Controllers\Karyawan\DashboardkController;
use App\Http\Controllers\Karyawan\SpendingkController;
use App\Http\Controllers\Karyawan\PoskController;
use App\Http\Controllers\Karyawan\StokbahankController;
use App\Http\Controllers\Karyawan\ResepkController;

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

    Route::get('cek-ongkir', [UserController::class, 'ongkir']);

    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);

    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::post('midtranspayment', [CheckoutController::class, 'midtrans']);
});

//admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('categories', [CategoryController::class ,'index']);
    Route::get('add-category', [CategoryController::class ,'add']);
    Route::post('insert-category', [CategoryController::class ,'insert']);
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
    Route::post('calculator', [DistrictController::class, 'calc']);


    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);
    Route::get('export-pdf', [OrderController::class, 'exportPdf']);
    Route::get('view-invoice/{id}', [OrderController::class, 'viewinvoice']);
    Route::get('print-invoice/{id}', [OrderController::class, 'invoice']);
    Route::get('truncate-orders', [OrderController::class, 'deleteorders']);

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
    Route::get('truncate-spendings', [SpendingController::class, 'deletespendings']);
    Route::get('export-pdfs', [SpendingController::class, 'exportPdf']);


    Route::get('pointofsales', [PosController::class, 'index']);
    Route::post('insert-pointofsale/{id}', [PosController::class, 'insert']);
    Route::put('update-pointofsale/{id}', [PosController::class, 'update']);
    Route::get('delete-pointofsale/{id}', [PosController::class, 'deletepos']);
    Route::post('checkout-pos', [PosController::class, 'checkoutpos']);

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

// karyawan
Route::middleware(['auth', 'isKaryawan'])->group(function () {
    Route::get('/dashboardkar', [DashboardkController::class, 'index']);

    Route::get('categorieskar', [CategorykController::class ,'index']);
    Route::get('add-categorykar', [CategorykController::class ,'add']);
    Route::post('insert-categorykar', [CategorykController::class ,'insert']);
    Route::get('edit-categorykar/{id}', [CategorykController::class ,'edit']);
    Route::put('update-categorykar/{id}', [CategorykController::class, 'update']);
    Route::get('delete-categorykar/{id}', [CategorykController::class, 'destroy']);

    Route::get('productskar', [ProductkController::class, 'index']);
    Route::get('add-productskar', [ProductkController::class, 'add']);
    Route::post('insert-productkar', [ProductkController::class, 'insert']);
    Route::get('edit-productkar/{id}', [ProductkController::class, 'edit']);
    Route::put('update-productkar/{id}', [ProductkController::class, 'update']);
    Route::get('delete-productkar/{id}', [ProductkController::class, 'destroy']);

    Route::get('districtskar', [DistrictkController::class, 'index']);
    Route::get('add-districtskar', [DistrictkController::class, 'add']);
    Route::post('insert-districtkar', [DistrictkController::class, 'insert']);
    Route::get('edit-districtkar/{id}', [DistrictkController::class, 'edit']);
    Route::put('update-districtkar/{id}', [DistrictkController::class, 'update']);
    Route::get('delete-districtkar/{id}', [DistrictkController::class, 'destroy']);
    Route::post('calculatorkar', [DistrictkController::class, 'calc']);


    Route::get('orderskar', [OrderkController::class, 'index']);
    Route::get('karyawan/view-orderkar/{id}', [OrderkController::class, 'view']);
    Route::put('update-orderkar/{id}', [OrderkController::class, 'updateorder']);
    Route::get('view-invoicekar/{id}', [OrderkController::class, 'viewinvoice']);
    Route::get('print-invoicekar/{id}', [OrderkController::class, 'invoice']);

    Route::get('pointofsaleskar', [PoskController::class, 'index']);
    Route::post('insert-pointofsalekar/{id}', [PoskController::class, 'insert']);
    Route::put('update-pointofsalekar/{id}', [PoskController::class, 'update']);
    Route::get('delete-pointofsalekar/{id}', [PoskController::class, 'deletepos']);
    Route::post('checkout-poskar', [PoskController::class, 'checkoutpos']);

    Route::get('stokbahankar', [StokbahankController::class, 'index']);
    Route::get('add-stokbahankar', [StokbahankController::class, 'add']);
    Route::post('insert-stokbahankar', [StokbahankController::class, 'insert']);
    Route::get('edit-stokbahankar/{id}', [StokbahankController::class, 'edit']);
    Route::put('update-stokbahankar/{id}', [StokbahankController::class, 'update']);
    Route::get('delete-stokbahankar/{id}', [StokbahankController::class, 'destroy']);
});