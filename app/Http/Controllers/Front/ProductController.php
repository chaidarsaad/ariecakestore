<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_detail(Product $product)
    {
        session()->put('product_id', $product->slug);
        $relatedProducts = Product::where('category_id', $product->category->id)->where('id', '!=', $product->id)->inRandomOrder()->get();

        return view('front.product-detail', [
            'product' => $product,
            'image' => $product->image,
            'relatedProducts' => $relatedProducts,
        ]);
    }
    public function all_products(Product $product)
    {
        $products = Product::where('is_active', 1)->paginate(30);
        return view('front.products', [
            'products' => $products,
            'image' => $product->image,
        ]);
    }
}
