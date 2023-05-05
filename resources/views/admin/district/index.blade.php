@extends('layouts.admin')

@section('title')
    Ongkos Kirim
@endsection

@section('content')

<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Ongkos Kirim</h2>
        <p class="dashboard-subtitle">
            Ongkos Kirim Berdasarkan Kecamatan
        </p>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{  url('add-districts') }}" class="btn btn-primary mb-3">
                            + Ongkos Kirim
                        </a>
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                <tr>
                                    <th class="">Kecamatan</th>
                                    <th class="">Harga</th>
                                    <th class="">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($districts as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ number_format($item->price) }}</td>
                    
                                            <td>
                                                <a href="{{ url('edit-district/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ url('delete-district/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        {{-- <p class="dashboard-subtitle">
                            Hitung Ongkir Disini
                        </p> --}}
                        {{-- <form action="{{ route('kalkulator.index') }}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Jarak Dari Kecamatan Paiton ke Kecamatan Tujuan</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id=""
                                            name="bil1"
                                            value=""
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Hasil</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id=""
                                            name=""
                                            value=""
                                        />
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="hitung" value="Hitung" class="btn btn-primary mb-3">	
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    <div class="card" style="display: none">
        <div class="card-header">
            <h4>List Ongkos Kirim</h4>
        </div>
        <div class="col-md-12">
            <a href="{{ url('add-districts') }}" class="btn btn-primary">Tambah Kecamatan</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="">Kecamatan</th>
                        <th class="">Harga</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($districts as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) }}</td>
    
                            <td>
                                <a href="{{ url('edit-district/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-district/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

