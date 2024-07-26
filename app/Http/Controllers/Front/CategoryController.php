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
        session()->put('category_id', $category->slug);
        $products = Product::where('category_id', $category->id)->where('is_active', 1)->paginate(30);
        return view('front.category', [
            'category' => $category,
            'products' => $products,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $categories = Category::where('name', 'LIKE', "%{$query}%")->get();

        $result = [];
        foreach ($categories as $category) {
            $result[] = [
                'slug' => $category->slug,
                'name' => $category->name,
            ];
        }

        return response()->json($result);
    }
}
