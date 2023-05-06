@extends('layouts.admin')

@section('title')
    Pengeluaran
@endsection

@section('content')

<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Pengeluaran</h2>
        <p class="dashboard-subtitle">
            Tambah Pengeluaran
        </p>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <a href="{{  url('spendings') }}" class="btn btn-primary mb-3">
                            Kembali
                        </a>
                        <form action="{{ url('insert-spending') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="description" placeholder="contoh beli tepung, telur, gula" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Total Pengeluaran</label>
                                        <input type="number" name="total_spending" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    <div class="card" style="display: none">
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

