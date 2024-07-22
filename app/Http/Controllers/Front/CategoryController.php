<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', 1)
            ->withCount(['products' => function ($query) {
                $query->where('is_active', 1);
            }])
            ->get();
        return view('front.categories', [
            'categories' => $categories,
        ]);
    }

    public function category(Category $category)
    {
        session()->put('category_id', $category->id);
        $products = Product::where('category_id', $category->id)->where('is_active', 1)->get();
        return view('front.category', [
            'category' => $category,
            'products' => $products,
            // 'relatedProducts' => Product::where('category_id', $category->id)->where('id', '!=', $category->id)->inRandomOrder()->take(4)->get(),
        ]);
    }
}
