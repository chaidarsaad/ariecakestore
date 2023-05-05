@extends('layouts.admin')

@section('title')
    Ongkos Kirim
@endsection

@section('content')
    <div class="card" style="display: none">
        <div class="card-header">
            <h4>Edit Produk "{{ $districts->name }}"</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-district/'.$districts->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Kecamatan</label>
                        <input type="text" class="form-control" value="{{ $districts->name }}" name="name" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Harga Ongkos Kirim</label>
                        <input type="number" class="form-control" value="{{ $districts->price }}" name="price" >
                    </div>
                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

