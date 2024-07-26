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
        // Ambil produk berdasarkan slug
        $product = Product::where('slug', $product->slug)->firstOrFail();

        // Ambil cart dari sesi
        $cart = session()->get('cart', []);

        // Ambil kuantitas dari permintaan, default 1
        $quantity = $request->input('quantity', 1);

        // Tambahkan produk ke cart atau perbarui kuantitas
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

        // Simpan cart ke sesi
        session()->put('cart', $cart);

        // Hitung total harga
        $totalPrice = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Kembalikan respons JSON
        return response()->json([
            'success' => true,
            'totalPrice' => $totalPrice,
            'cart' => $cart
        ]);
    }


    public function removeFromCart($productSlug)
    {
        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Temukan produk berdasarkan slug
        $productKey = null;
        foreach ($cart as $key => $item) {
            if ($item['slug'] === $productSlug) {
                $productKey = $key;
                break;
            }
        }

        // Jika produk ditemukan dalam keranjang
        if ($productKey !== null) {
            // Hapus produk dari keranjang
            unset($cart[$productKey]);

            // Reindex array dan simpan kembali ke session
            $cart = array_values($cart);
            session()->put('cart', $cart);
        }

        // Hitung total harga baru
        $totalPrice = array_reduce($cart, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);

        // Redirect atau return response sesuai kebutuhan
        return response()->json(['success' => true, 'totalPrice' => $totalPrice]);
    }

    public function updateCart(Request $request, $productSlug)
    {
        $quantity = $request->input('quantity');

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Temukan produk berdasarkan slug
        foreach ($cart as $key => $item) {
            if ($item['slug'] === $productSlug) {
                // Update kuantitas produk
                $cart[$key]['quantity'] = $quantity;
                break;
            }
        }

        // Simpan keranjang yang diperbarui ke session
        session()->put('cart', $cart);

        // Hitung total harga baru
        $totalPrice = array_reduce($cart, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);

        return response()->json(['success' => true, 'totalPrice' => $totalPrice]);
    }

    public function updateQuantity(Request $request, $slug)
    {
        $quantity = $request->input('quantity');

        // Validasi kuantitas jika perlu
        if ($quantity < 1) {
            return response()->json(['success' => false, 'message' => 'Invalid quantity'], 400);
        }

        // Logika untuk memperbarui kuantitas dalam cart
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
