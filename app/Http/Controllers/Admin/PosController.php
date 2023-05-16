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
        $positems = Pos::all();

        if (request()->ajax()) {
            $query = Product::query();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group">
                        <div class="" aria-labelledby="action' .  $item->id . '">
                            <form action="' . url('insert-pointofsale', $item->id) . '" method="post">
                                ' . method_field('post') . csrf_field() . '
                                <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                            </form>
                        </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('admin.pos.index', [
            'positems' => $positems
        ]);

        // $products = Product::all();
        // $positems = Pos::all();
        // return view('admin.pos.index', [
        //     'products' => $products,
        //     'positems' => $positems
        // ]);
    }

    //tambah product ke pos
    public function insert(Request $request, $id){

        $data = [
            'prod_id' => $id,
            'prod_qty' => 1,
        ];

        Pos::create($data);

        // $pos = new Pos();
        // $pos->prod_id = '$id',
        // $pos->prod_qty = 1;
        // $pos->save();
        return redirect('pointofsales');
        // $product_qty = $request->input('product_qty');
    }

    //hitung kembalian
   

    //update prod_qty
    public function update(Request $request, $id){
        $pos = Pos::find($id);
        $pos->prod_qty = $request->input('prod_qty');
        $pos->update();
        return redirect('pointofsales');
    }

    public function deletepos($id){
      $pos = Pos::find($id);
      $pos->delete();
      return redirect('pointofsales');
    }
}
