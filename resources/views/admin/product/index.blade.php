@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>List Produk</h4>
        </div>
        <div class="col-md-12">
            <a href="{{ url('add-products') }}" class="btn btn-primary">Tambah Produk</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th class="">Nama</th>
                        <th class="">Harga</th>
                        <th class="">Foto</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/products/'.$item->image) }}" class="cate-image" alt="Image here">
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

