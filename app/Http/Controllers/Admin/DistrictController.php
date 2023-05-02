<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('admin.district.index', compact('districts'));
    }

    public function add()
    {
        $districts = District::all();
        return view('admin.district.add', compact('districts'));
    }

    public function insert(Request $request)
    {
        $districts = new District();
       
        $districts->name = $request->input('name');
        $districts->price = $request->input('price');
        $districts->save();
        return redirect('districts')->with('status',"Kecamatan Berhasil Ditambah");
    }

    public function edit($id)
    {
        $districts = District::find($id);
        return view('admin.district.edit', compact('districts'));
    }

    public function update(Request $request, $id)
    {
        $districts = District::find($id);
        $districts->name = $request->input('name');
        $districts->price = $request->input('price');
        $districts->update();
        return redirect('districts')->with('status',"Kecamatan Berhasil Diupdate");
    }

    public function destroy($id)
    {
        $districts = District::find($id);
        $districts->delete();
        return redirect('districts')->with('status',"Kecamatan Berhasil Dihapus");
    }
}
