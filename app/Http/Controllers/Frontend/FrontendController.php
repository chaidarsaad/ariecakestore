<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Product;
use App\Models\District;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(8)->get();
        $trending_category = Category::where('popular','1')->take(6)->get();
        return view('frontend.index', [
            'featured_products' => $featured_products,
            'trending_category' => $trending_category
        ]);
    }

    public function category()
    {
        $category = Category::where('status','1')->get();
        return view('frontend.category', [
            'category' => $category
        ]);
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status','1')->get();
            return view('frontend.products.index', [
                'category' => $category,
                'products' => $products
            ]);
        }
        else{
            return redirect('/')->with('status',"Slug tidak tersedia");
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $products = Product::where('slug', $prod_slug)->first();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $products->id)->get();
                if($ratings->count() > 0)
                {
                    $rating_value = $rating_sum/$ratings->count();
                }
                else{
                    $rating_value = 0;
                }
                return view('frontend.products.view', [
                    'products' => $products,
                    'ratings' => $ratings,
                    'reviews' => $reviews,
                    'rating_value' => $rating_value, 
                    'user_rating' => $user_rating
                ]);
            }
            else{
                return redirect('/')->with('status',"Link telah rusak");
            }
        }
        else{
            return redirect('/')->with('status',"Tidak ada kategori yang ditemukan");
        }
    }

    public function productlistAjax()
    {
        $products = Product::select('name')->where('status','1')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;

        if($searched_product != "")
        {
            $product = Product::where("name","LIKE","%$searched_product%")->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with("status","No products matched your search");
            }
        }
        else{
            return redirect()->back();
        }
    }
}
