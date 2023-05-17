<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (
                !Product::where('id', $item->prod_id)
                    ->where('qty', '>=', $item->prod_qty)
                    ->exists()
            ) {
                $removeItem = Cart::where('user_id', Auth::id())
                    ->where('prod_id', $item->prod_id)
                    ->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $userd = User::with(['district'])->find(Auth::id());
        // $cartitems = User::with(['district'])->find(Auth::id());
        $district = District::all();
        $order = Order::all();
        return view('frontend.checkout', [
            'cartitems' => $cartitems,
            'district' => $district,
            'userd' => $userd,
            'order' => $order,
        ]);
    }



    public function midtrans(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->phone = $request->input('phone');
        $order->districts_id = $request->input('districts_id');
        $order->address1 = $request->input('address1');
        $order->status_pickup = $request->input('status_pickup');

        // To Calculate the total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->price * $prod->prod_qty;
        }

        $order->total_price = $total;

        $request->request->add(['status_pembayaran' => 'Unpaid']);
        // $order->status = 'Unpaid';

        $order->tracking_no = 'ariecakestore-' . mt_rand(00000, 99999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();

            
            // if($prod->resep){
            $reseps = $prod->resep;
            foreach ($reseps as $resep) {
                $stokBahan = $resep->stokbahan;
                $stokBahan->netto -= $resep->netto * $item->prod_qty;
                $stokBahan->save();
            // }
            }
        }

        if (Auth::user()->address1 == null) {
            $user = User::where('id', Auth::id())->first();
            $user->phone = $request->input('phone');
            $user->districts_id = $request->input('districts_id');
            $user->address1 = $request->input('address1');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        //konfig midtrans
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        //buat array untuk dikirim ke midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $order->tracking_no,
                'gross_amount' => (int) $total,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => $order->phone,
            ],
            'enabled_payments' => ['gopay', 'permata_va', 'bank_transfer'],
            'vtweb' => [],
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return redirect('my-orders')->with('status', 'Pesnanan Berhasil Dibuat');
    }

    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.serverKey');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::find($request->order_id);
                $order->update(['status_pembayaran' => 'Paid']);
            }
        }
    }

    public function pos(Request $request)
    {
        $orderpos = new Order();
        $orderpos->save();
    }
}
