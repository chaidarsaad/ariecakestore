<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pos;
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
    public function addpos(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
    }

    public function deletepos($id){
      $pos = Pos::find($id);
      $pos->delete();
      return redirect('pointofsales')->with('status',"Product Berhasil Dihapusy");
    }
}
