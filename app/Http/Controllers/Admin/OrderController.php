<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $orders->status_pesanan = $request->input('status_pesanan');
        $orders->update();
        return redirect('admin/view-order/'.$id)->with('status', "Pesanan Telah di Update");
        // return redirect('orders')->with('status', "Pesanan Telah di Update");
        // return redirect()->route('view-order/')
    }

    public function orderhistory()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.history', [
            'orders' => $orders
        ]);
    }

    public function exportPdf(){
        $orders = Order::all();
        $pdf = Pdf::loadView('admin.orders.index', [
            'orders' => $orders
        ]);
        return $pdf->download('invoice.pdf');
    }
}
