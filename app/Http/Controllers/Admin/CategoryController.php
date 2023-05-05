<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Yajra\DataTables\Facades\DataTables;


class CategoryController extends Controller
{
    public function index()
    {
        // $category = Category::all();
        if (request()->ajax()) {
            $query = Category::query();

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
                                    <a class="dropdown-item" href="' . url('edit-category', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . url('delete-category', $item->id) . '" method="get">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->editColumn('image', function ($item) {
                    return $item->image ? '<img src="' . asset('assets/uploads/category/'.$item->image) . '" style="max-height: 40px;"/>' : '';
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('admin.category.index');
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->save();
        return redirect('categories')->with('status',"Category Berhasil Ditambah");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->update();
        return redirect('categories')->with('status',"Category Berhasil Diupdate");
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status',"Category Berhasil Dihapus");
    }

}
