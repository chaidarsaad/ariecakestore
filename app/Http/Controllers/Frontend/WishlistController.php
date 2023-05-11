<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', [
            'wishlist' => $wishlist
        ]);
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => "Produk sudah ada di Wishlist"]);
                }
                else
                {
                    $wish = new Wishlist();
                    $wish->prod_id = $prod_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status' => "Produk ditambahkan ke Wishlist"]);
                }
            }
            else{
                return response()->json(['status' => "Produk tidak tersedia"]);
            }
        }
        else{
            return response()->json(['status' => "Login untuk menambahkan ke wishlist"]);
        }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Produk dihapus dari Wishlist"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login untuk menambahkan ke wishlist"]);
        }
    }

    public function wishlistcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $wishcount]);
    }
}
