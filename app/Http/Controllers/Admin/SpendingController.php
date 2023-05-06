<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spending;
use Yajra\DataTables\Facades\DataTables;


class SpendingController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            $query = Spending::query();

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
                                    <a class="dropdown-item" href="' . url('edit-spending', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . url('delete-spending', $item->id) . '" method="get">
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
        return view('admin.spending.index');
    }

    public function add(){
        return view('admin.spending.add');
    }

    public function insert(Request $request){
        $spendings = new Spending();
        $spendings->description = $request->input('description');
        $spendings->total_spending = $request->input('total_spending');
        $spendings->save();
        return redirect('spendings')->with('status',"Pengeluaran Berhasil Ditambah");
    }

    public function edit($id)
    {
        $spendings = Spending::find($id);
        return view('admin.spending.edit', compact('spendings'));
    }

    public function update(Request $request, $id)
    {
        $spendings = Spending::find($id);
        $spendings->description = $request->input('description');
        $spendings->total_spending = $request->input('total_spending');
        $spendings->update();
        return redirect('spendings')->with('status',"Pengeluaran Berhasil Diupdate");
    }

    public function destroy($id)
    {
        $spendings = District::find($id);
        $spendings->delete();
        return redirect('spendings')->with('status',"Pengeluaran Berhasil Dihapus");
    }
}
