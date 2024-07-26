<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return view('front.cart-empty');
        }

        return view('front.cart');
    }

    public function add(Request $request, Product $product)
    {
        $product = Product::where('slug', $product->slug)->firstOrFail();

        $cart = session()->get('cart', []);

        $quantity = $request->input('quantity', 1);

        if (isset($cart[$product->slug])) {
            $cart[$product->slug]['quantity'] += $quantity;
        } else {
            $cart[$product->slug] = [
                "name" => $product->name,
                "slug" => $product->slug,
                "quantity" => $quantity,
                "price" => $product->price,
                "thumbnail" => $product->thumbnail,
            ];
        }

        session()->put('cart', $cart);

        $totalPrice = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return response()->json([
            'success' => true,
            'totalPrice' => $totalPrice,
            'cart' => $cart
        ]);
    }


    public function removeFromCart($productSlug)
    {
        $cart = session()->get('cart', []);

        $productKey = null;
        foreach ($cart as $key => $item) {
            if ($item['slug'] === $productSlug) {
                $productKey = $key;
                break;
            }
        }

        if ($productKey !== null) {
            unset($cart[$productKey]);

            $cart = array_values($cart);
            session()->put('cart', $cart);
        }

        $totalPrice = array_reduce($cart, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);

        return response()->json(['success' => true, 'totalPrice' => $totalPrice]);
    }

    public function updateCart(Request $request, $productSlug)
    {
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            if ($item['slug'] === $productSlug) {
                // Update kuantitas produk
                $cart[$key]['quantity'] = $quantity;
                break;
            }
        }

        session()->put('cart', $cart);

        $totalPrice = array_reduce($cart, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);

        return response()->json(['success' => true, 'totalPrice' => $totalPrice]);
    }

    public function updateQuantity(Request $request, $slug)
    {
        $quantity = $request->input('quantity');

        if ($quantity < 1) {
            return response()->json(['success' => false, 'message' => 'Invalid quantity'], 400);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$slug])) {
            $cart[$slug]['quantity'] = $quantity;
            session()->put('cart', $cart);
            $totalPrice = array_reduce($cart, function ($carry, $item) {
                return $carry + ($item['price'] * $item['quantity']);
            }, 0);

            return response()->json(['success' => true, 'totalPrice' => $totalPrice]);
        }

        return response()->json(['success' => false, 'message' => 'Product not found in cart'], 404);
    }

    public function clearCart(Request $request)
    {
        session()->forget('cart');
        return response()->json(['success' => true]);
    }
}
