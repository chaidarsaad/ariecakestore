@extends('layouts.admin')

@section('content')

@section('content')
<!-- Section Content -->  
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Admin Dashboard</h2>
        <p class="dashboard-subtitle">ariecakestore administrator panel</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <a href="{{ url('users') }}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Customer
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $users }}
                                </div>
                            </div>
                        </a>
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
                        <a href="{{ url('spendings') }}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Pengeluaran
                                </div>
                                <div class="dashboard-card-subtitle">
                                    Rp {{ number_format($spending) }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Laba Bersih
                            </div>
                            <div class="dashboard-card-subtitle">
                                Rp {{ number_format($lababersih) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <a href="{{ url('orders') }}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Transaction
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $total_orders }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <a href="{{ url('orders') }}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Transaction Success
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $completed_orders }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <a href="{{ url('orders') }}" style="text-decoration: none">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Transaction Pending
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $pending_orders }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>
@endsection

