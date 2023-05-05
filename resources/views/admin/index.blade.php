@extends('layouts.admin')

@section('content')

@section('content')
<!-- Section Content -->  
  <div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Admin Dashboard</h2>
        <p class="dashboard-subtitle">ariecakestore administrator panel</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Total Customer
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{ $users }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Total Transaction
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{ $total_orders }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <a href="{{ url('products') }}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Produk
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $product }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <a href="{{ url('categories') }}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Kategori
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $category }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Laba Kotor
                            </div>
                            <div class="dashboard-card-subtitle">
                                Rp {{ number_format($revenue) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Pengeluaran
                            </div>
                            <div class="dashboard-card-subtitle">
                                Rp 1
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Laba Bersih
                            </div>
                            <div class="dashboard-card-subtitle">
                                Rp 1
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Transaction Success
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{ $completed_orders }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Transaction Pending
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{ $pending_orders }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>

    <div style="display: none" class="card py-5">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body bg-primary">
                                <h4 class="font-weight-bold text-white font-weight-bold">Total Categories : {{ $category }} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body bg-secondary">
                                <h4 class="font-weight-bold text-white">Total Products : {{ $product }} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body bg-warning">
                                <h4 class="font-weight-bold ">Total users : {{ $users }} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body bg-info">
                                <h4 class="font-weight-bold text-white">Total Orders : {{ $total_orders }} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body bg-success">
                                {{-- <h4 class="font-weight-bold text-white">Completed Orders : {{ $completed_orders }} </h4> --}}
                                <h4 class="font-weight-bold text-white">Completed Orders : </h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body bg-danger">
                                {{-- <h4 class="font-weight-bold text-white">Pending Orders : {{ $pending_orders }} </h4> --}}
                                <h4 class="font-weight-bold text-white">Pending Orders : </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

