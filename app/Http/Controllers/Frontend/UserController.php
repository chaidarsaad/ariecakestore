<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }

    public function user(){
        $user = Auth::user();
        return view('frontend.profile.index', compact('user'));
    }

    public function edit(){
        $user = Auth::user();
        return view('frontend.profile.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address1 = $request->input('address1');
        $user->districts_id = $request->input('districts_id');
        $user->update();
        return redirect('my-profile')->with('status',"Profile Berhasil Diupdate");
    }
}
