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
        $trendingProducts = Product::where('is_trending', 1)->take(6)->get();
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
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        $result = [];
        foreach ($products as $product) {
            $result[] = [
                'slug' => $product->slug,
                'name' => $product->name,
            ];
        }

        return response()->json($result);
    }
}
