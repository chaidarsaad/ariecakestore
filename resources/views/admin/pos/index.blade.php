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
                                            <th style="width: 1px">Jumlah</th>
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
                                                        <div class="form-group">
                                                            <input type="number" name="prod_qty" class="form-control" value="{{ $item->prod_qty }}">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">
                                                        Update
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                {{-- <div class="btn-group">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                                            type="button" id="action' .  $item->id . '"
                                                                data-toggle="dropdown" 
                                                                aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Aksi
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                                            <form action="{{ url('update-pointofsale/'.$item->id) }}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit" class="dropdown-item text-success">
                                                                    Update
                                                                </button>
                                                            </form>
                                                            <form action="{{ url('delete-pointofsale/'.$item->id) }}" method="get">
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> --}}
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
                                <label class="">Uang Bayar : </label>
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