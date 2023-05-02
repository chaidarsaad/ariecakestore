@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Kecamatan
                <a href="{{ url('districts') }}" class="btn btn-primary btn-sm float-right">Kembali</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-district') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Kecamatan</label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Harga Ongkos Kirim</label>
                        <input type="number" class="form-control" name="price" >
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

