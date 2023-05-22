<?php

namespace App\Http\Controllers\Karyawan;

use App\Models\District;
use App\Models\Calculate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;


class DistrictkController extends Controller
{
    public function index()
    {
        // $districts = District::all();

        if (request()->ajax()) {
            $query = District::query();

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
                                    <a class="dropdown-item" href="' . url('edit-districtkar', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . url('delete-districtkar', $item->id) . '" method="get">
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
        return view('karyawan.district.index');
    }

    public function add()
    {
        return view('karyawan.district.add');
    }

    public function insert(Request $request)
    {
        $districts = new District();
       
        $districts->name = $request->input('name');
        $districts->price = $request->input('price');
        $districts->save();
        return redirect('districtskar')->with('status',"Kecamatan Berhasil Ditambah");
    }

    public function edit($id)
    {
        $districts = District::find($id);
        return view('karyawan.district.edit', [
            'districts' => $districts
        ]);
    }

    public function update(Request $request, $id)
    {
        $districts = District::find($id);
        $districts->name = $request->input('name');
        $districts->price = $request->input('price');
        $districts->update();
        return redirect('districtskar')->with('status',"Kecamatan Berhasil Diupdate");
    }

    public function destroy($id)
    {
        $districts = District::find($id);
        $districts->delete();
        return redirect('districtskar')->with('status',"Kecamatan Berhasil Dihapus");
    }
}
