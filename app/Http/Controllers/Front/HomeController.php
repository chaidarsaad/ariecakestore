<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', 1)->get();
        $newArrivals = Product::where('is_active', 1)
            ->latest()
            ->take(4)
            ->get();
        $trendingProducts = Product::where('is_trending', 1)->take(4)->get();
        $randomProducts = Product::inRandomOrder()->take(6)->get();
        $banner1 = Banner::first();
        $banner2 = Banner::latest()->first();


        return view('front.home', [
            'categories' => $categories,
            'newArrivals' => $newArrivals,
            'trendingProducts' => $trendingProducts,
            'randomProducts' => $randomProducts,
            'banner1' => $banner1,
            'banner2' => $banner2,
            // Uncomment the following lines to enable the featured products section
            // Uncomment the following lines to enable the search functionality
            // Uncomment the following lines to enable the related products functionality
            // 'featuredProducts' => Product::where('is_featured', 1)->get(),
            // 'bestsellers' => Product::where('is_bestseller', 1)->get(),
            // 'onSales' => Product::where('is_onsale', 1)->get(),
            // 'specials' => Product::where('is_special', 1)->get(),
            // 'products' => Product::latest()->paginate(12)
        ]);
    }
}
