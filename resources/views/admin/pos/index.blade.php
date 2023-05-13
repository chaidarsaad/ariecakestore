@extends('layouts.admin')

@section('title')
    Point Of Sales
@endsection

@section('content')

<div class="section-content section-dashboard-home" data-aos="fade-up" >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Point Of Sales</h2>
            <br>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <label>List Produk</label>
                            <div class="table-responsive">
                                <table id="crudTable" class="table table-hover scroll-horizontal-vertical">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
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
                                            <th style="width: 15%">Jumlah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $totalPrice = 0 @endphp
                                        @foreach($positems as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product->price }}</td>
                                            {{-- <td>{{ $item->prod_qty }}</td> --}}
                                            <td>
                                                <form action="{{ url('update-pointofsale/'.$item->id) }}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="input-group mb-1">
                                                            <input type="number" class="form-control" placeholder="Jumlah" name="prod_qty" value="{{ $item->prod_qty }}">
                                                            <button type="submit" class="btn btn-success" type="button">Update</button>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <input type="number" name="prod_qty" class="form-control" value="{{ $item->prod_qty }}">
                                                        </div> --}}
                                                    </div>
                                                    {{-- <button type="submit" class="btn btn-success">
                                                        Update
                                                    </button> --}}
                                                </form>
                                            </td>
                                            <td>
                                                {{-- <a href="{{ url('delete-pointofsale/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                                <a href="{{ url('delete-pointofsale/'.$item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                        @php $totalPrice += $item->product->price * $item->prod_qty @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <label class="">Total Harga : Rp {{ number_format($totalPrice ?? 0) }}</label>
                                <div class="input-group mb-3">
                                    <input name="uang_bayar" type="number" class="form-control" placeholder="Uang Bayar" aria-label="Uang Bayar" aria-describedby="button-addon2">
                                    <button class="btn btn-primary" type="button">Hitung Kembalian</button>
                                </div>
                                {{-- <div class="row">
                                    <label class="">Uang Bayar : 
                                    <div class="col-md-6">
                                        <input type="number" class="form-control">
                                    </div>
                                </label>
                                </div> --}}
                                <label class="">Kembalian : </label>
                                <button class="btn btn-success">
                                    Bayar
                                </button>
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
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                { data: 'qty', name: 'qty' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>

    <script>
        let table = new DataTable('#myTable');
    </script>
@endpush