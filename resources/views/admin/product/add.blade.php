@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Produk
                <a href="{{ url('products') }}" class="btn btn-primary btn-sm float-right">Kembali</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form-select" name="cate_id" required>
                            <option value="">Pilih Category</option>
                            @foreach ($cateogry as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Deskripsi Produk</label>
                        <textarea name="small_description" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tampilkan Produk?</label>
                        <input type="checkbox" name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending">
                    </div>
                    <div class="col-md-12">
                        <label>Pilih Foto Produk</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

