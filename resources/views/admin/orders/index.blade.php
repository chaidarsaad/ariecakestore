@extends('layouts.admin')

@section('title')
    Pesanan
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Pesanan</h2>
            <p class="dashboard-subtitle">
                List Transaksi
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Nomor Pesanan</th>
                                            <th>Total Harga</th>
                                            <th>Status Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ $item->fname }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->tracking_no }}</td>
                                                <td>Rp {{ number_format($item->total_price) }}</td>
                                                {{-- <td>{{ $item->status == '0' ? 'PROSES' : 'PESANAN SIAP, SILAHKAN AMBIL DI TOKO', 'DIANTARKAN KE ALAMAT TUJUAN'}}</td> --}}
                                                <td>{{ $item->status_pembayaran }}</td>
                                                <td>
                                                    <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">Lihat</a>
                                                </td>
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