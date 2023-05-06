<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;


class PosController extends Controller
{
    // buat nampilin product
    public function index(){
        if (request()->ajax()) {
            $query = Product::query();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn">
                        <form action="' . url('insert-pointofsale', $item->id) . '" method="post">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-primary">
                                Tambah
                            </button>
                        </form>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('admin.pos.index');
    }

    //tambah product ke pos
    public function addpos(){
        
    }
}
