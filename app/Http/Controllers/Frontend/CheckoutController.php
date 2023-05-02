<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->phone = $request->input('phone');
        $order->districts_id = $request->input('districts_id');
        $order->address1 = $request->input('address1');

        // $order->payment_mode = $request->input('payment_mode');
        // $order->payment_id = $request->input('payment_id');

        // To Calculate the total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->products->price * $prod->prod_qty;
        }

        $order->total_price = $total;

        $order->tracking_no = 'ariecakestore-' . mt_rand(00000,99999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item){
            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id' => $item->prod_id,
                'qty'=> $item->prod_qty,
                'price' => $item->products->price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->phone = $request->input('phone');
            $user->districts_id = $request->input('districts_id');
            $user->address1 = $request->input('address1');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        if($request->input('payment_mode') == "Paid by Razorpay" || $request->input('payment_mode') == "Paid by Paypal")
        {
            return response()->json(['status'=> "Order placed Successfully"]);
        }
        return redirect('/')->with('status', "Pesnanan Berhasil Dibuat");
    }

    // public function razorpaycheck(Request $request){
    //     $cartitems = Cart::where('user_id', Auth::id())->get();
    //     $total_price = 0;
    //     foreach($cartitems as $item)
    //     {
    //         $total_price += $item->products->selling_price * $item->prod_qty;
    //     }

    //     $firstname = $request->input('firstname');
    //     $lastname = $request->input('lastname');
    //     // $email = $request->input('email');
    //     $phone = $request->input('phone');
    //     $address1 = $request->input('address1');
    //     $address2 = $request->input('address2');
    //     $city = $request->input('city');
    //     $state = $request->input('state');
    //     $country = $request->input('country');
    //     $pincode = $request->input('pincode');

    //     return response()->json([
    //         'firstname'=> $firstname,
    //         'lastname'=> $lastname,
    //         // 'email'=> $email,
    //         'phone'=> $phone,
    //         'address1'=> $address1,
    //         'address2'=> $address2,
    //         'city'=> $city,
    //         'state'=> $state,
    //         'country'=> $country,
    //         'pincode'=> $pincode,
    //         'total_price' => $total_price
    //     ]);
    // }
}
