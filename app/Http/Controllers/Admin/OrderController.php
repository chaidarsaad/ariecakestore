<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        // $orders = Order::where('status','0')->get();
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', [
            'orders' => $orders
        ]);
    }

    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status', "Pesanan Telah di Update");
    }

    public function orderhistory()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.history', [
            'orders' => $orders
        ]);
    }
}
