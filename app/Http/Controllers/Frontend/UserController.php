<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\District;
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
        return view('frontend.orders.index', [
            'orders' => $orders
        ]);
    }

    public function view($id)
    {
        $district = District::all();
        $userd = User::with(['district'])->find(Auth::id());
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first(); //pr relasiin ke table district gatau query nya
        return view('frontend.orders.view', [
            'orders' => $orders,
            'district' => $district,
            'userd' => $userd
        ]);
    }

    public function user(){
        $district = District::all();
        $user = User::with(['district'])->find(Auth::id());
        // $user = Auth::user();
        return view('frontend.profile.index', [
            'district' => $district,
            'user' => $user
        ]);
    }

    public function edit(){
        $district = District::all();
        $user = User::with(['district'])->find(Auth::id());
        // $user = Auth::user();
        return view('frontend.profile.edit', [
            'district' => $district,
            'user' => $user
        ]);
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

    public function ongkir(){
        $district = District::all();
        return view('frontend.ongkir', [
            'district' => $district
        ]);
    }
}
