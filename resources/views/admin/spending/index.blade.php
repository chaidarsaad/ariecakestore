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
            List Pengeluaran
        </p>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{  url('add-spendings') }}" class="btn btn-primary mb-3">
                            + Pengeluaran
                        </a>
                        <a href="{{ url('export-pdfs') }}" class="btn btn-primary mb-3">Cetak Laporan Pengeluaran</a>

                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="myTable">
                                <thead>
                                <tr>
                                    <th class="">Keterangan</th>
                                    <th class="">Pengeluaran</th>
                                    <th class="">Tanggal</th>
                                    <th class="">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($spendings as $item)
                                        <tr>
                                            <td>{{ $item->description }}</td>
                                            <td>Rp {{ number_format($item->total_spending) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('edit-spending/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ url('delete-spending/'.$item->id) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ url('truncate-spendings') }}" class="btn btn-danger">Hapus Semua</a>
                        </div>
                        <hr>
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

