<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Resep;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();

        if (request()->ajax()) {
            $query = Product::with(['category']);

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
                                    <a class="dropdown-item" href="' . url('edit-product', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . url('delete-product', $item->id) . '" method="get">
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
                    return $item->image ? '<img src="' . asset('assets/uploads/products/'.$item->image) . '" style="max-height: 40px;"/>' : '';
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('admin.product.index');
    }

    public function add()
    {
        $products = Product::all();
        $category = Category::all();
        return view('admin.product.add', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function insert(Request $request)
    {
        $products = new Product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/',$filename);
            $products->image = $filename;
        }
        


        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = Str::slug($request->input('name'));
        $products->small_description = $request->input('small_description');
        $products->price = $request->input('price');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->trending = $request->input('trending') == TRUE ? '1':'0';

        

        $products->save();


        return redirect('products')->with('status',"Product Berhasil Ditambah");
    }

    public function edit($id)
    {
        $category = Category::all();
        $products = Product::with(['category'])->findOrFail($id);
        return view('admin.product.edit', [
            'category' => $category,
            'products' => $products
        ]);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/',$filename);
            $products->image = $filename;
        }
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = Str::slug($request->input('name'));
        $products->small_description = $request->input('small_description');
        $products->price = $request->input('price');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->trending = $request->input('trending') == TRUE ? '1':'0';
        $products->update();
        return redirect('products')->with('status',"Product Berhasil Diupdate");
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $path = 'assets/uploads/products/'.$products->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $products->delete();
        return redirect('products')->with('status',"Product Berhasil Dihapus");
    }
}
