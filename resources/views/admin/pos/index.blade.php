@extends('layouts.admin')

@section('title')
    Point Of Sales
@endsection

@section('content')

<div class="section-content section-dashboard-home" data-aos="fade-up" >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Point Of Sales</h2>
            <p class="dashboard-subtitle">
                List Produk
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('insert-pos') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover scroll-horizontal-vertical">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <label>Barang yang dibeli</label>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-hover scroll-horizontal-vertical w-100">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($positems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->products->price }}</td>
                                                <td>{{ $item->prod_qty }}</td>
                                                <td><a href="{{ url('delete-pointofsale/'.$item->id) }}" class="btn btn-danger btn-sm">Hapus</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endpush