<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;

class ResepController extends Controller
{
    Public function index(){
        if (request()->ajax()) {
            $query = Resep::with(['product']);

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . url('edit-resep', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . url('delete-resep', $item->id) . '" method="get">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                
                ->rawColumns(['action'])
                ->make();
        }
        return view('admin.resep.index');
    }

    public function add(){
        $resep = Resep::all();
        return view('admin.resep.add', compact('resep'));
    }

    public function insert(Request $request)
    {
        $reseps = new Resep();

        $reseps->prod_id = $request->input('prod_id');
        $reseps->resep = $request->input('resep');
        $reseps->netto = $request->input('netto');
        $reseps->save();
        return redirect('resep')->with('status',"Resep Berhasil Ditambah");

    }
}
