<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_detail(Product $product)
    {
        session()->put('product_id', $product->id);

        return view('front.product-detail', [
            'product' => $product,
            'image' => $product->image,
        ]);
    }
}
