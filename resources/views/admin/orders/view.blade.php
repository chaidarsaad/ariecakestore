@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')

<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Pesanan</h2>
            <p class="dashboard-subtitle">
                Detail Transaksi
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{  url('orders') }}" class="btn btn-primary mb-3">
                                Kembali
                            </a>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Detail Pesanan</h4>
                                <hr>
                                <label for="">Nama Lengkap</label>
                                <div class="border p-2 mt-0">{{ $orders->fname }}</div>
                                <label for="">No WhatsApp</label>
                                <div class="border"><a style="text-decoration: none" href="https://wa.me/{{ $orders->phone }}">{{ $orders->phone }}</a></div>
                                <label for="">Alamat Lengkap</label>
                                <div class="border p-2 mt-0">
                                    {{ $orders->address1 }}<br>
                                    {{ $orders->districts_id }}<br>
                                </div>
                            </div>
                            <div class="col-md-6 table-responsive">
                                <h4>Detail Harga</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Foto</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" width="50px" alt="Product Image">
                                                </td>
                                                <td>{{ $item->qty }}</td>
                                                <td>Rp {{ number_format($item->price) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>Total Harga : <span class="float-end">Rp {{ number_format($orders->total_price) }}</span></h4>
                                <h6>Status Pembayaran : <span class="float-end">{{ ($orders->status) }}</span></h6>
                                {{-- @if($orders->payment_id)
                                    <label for="">Payment Id : {{ $orders->payment_id }}</label>
                                @endif
                                <div class="mt-5">
                                    <label for="">Status Pesanan</label>
                                    <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option {{ $orders->status == '0'? 'selected':'' }} value="0">PROSES</option>
                                            <option {{ $orders->status == '1'? 'selected':'' }} value="1">PESANAN SIAP, SILAHKAN AMBIL DI TOKO</option>
                                            <option {{ $orders->status == '2'? 'selected':'' }} value="2">DIANTARKAN KE ALAMAT TUJUAN</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
                                    </form>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container py-5" style="display: none">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">{{ $orders->tracking_no }}
                            <a href="{{ url('orders') }}" class="btn btn-warning float-right">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Detail Pesanan</h4>
                                <hr>
                                <label for="">Nama Lengkap</label>
                                <div class="border p-2 mt-0">{{ $orders->fname }}</div>
                                <label for="">No WhatsApp</label>
                                <div class="border"><a style="text-decoration: none" href="https://wa.me/{{ $orders->phone }}">{{ $orders->phone }}</a></div>
                                <label for="">Alamat Lengkap</label>
                                <div class="border p-2 mt-0">
                                    {{ $orders->address1 }}<br>
                                    {{ $orders->city }}<br>
                                    {{ $orders->state }}
                                    {{ $orders->country }}
                                </div>
                            </div>
                            <div class="col-md-6 table-responsive">
                                <h4>Detail Harga</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>Rp {{ number_format($item->price) }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" width="50px" alt="Product Image">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Total Harga : <span class="float-end">Rp {{ number_format($orders->total_price) }}</span> </h4>
                                <label for="">Payment Mode : {{ $orders->payment_mode }}</label> <br>
                                @if($orders->payment_id)
                                    <label for="">Payment Id : {{ $orders->payment_id }}</label>
                                @endif
                                <div class="mt-5 px-2">
                                    <label for="">Status Pesanan</label>
                                    <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option {{ $orders->status == '0'? 'selected':'' }} value="0">PROSES</option>
                                            <option {{ $orders->status == '1'? 'selected':'' }} value="1">PESANAN SIAP, SILAHKAN AMBIL DI TOKO</option>
                                            <option {{ $orders->status == '2'? 'selected':'' }} value="2">DIANTARKAN KE ALAMAT TUJUAN</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
