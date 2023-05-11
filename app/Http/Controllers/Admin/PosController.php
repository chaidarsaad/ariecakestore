<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pos;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class PosController extends Controller
{
    
    // buat nampilin product
    public function index(){
        $products = Product::all();
        $positems = Pos::all();
        return view('admin.pos.index', compact('products', 'positems'));
    }

    //tambah product ke pos
    public function insert(Request $request){

        $pos = new Pos();
        $pos->prod_id = 1;
        $pos->prod_qty = 1;
        $pos->save();
        return redirect('pointofsales');
        // $product_qty = $request->input('product_qty');
    }

    public function deletepos($id){
      $pos = Pos::find($id);
      $pos->delete();
      return redirect('pointofsales');
    }
}
