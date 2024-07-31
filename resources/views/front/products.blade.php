@extends('layouts.front')

@section('title')
    Arie Cake Store | Semua Produk
@endsection

@push('addon-style')
@endpush

@section('content')
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="javascript:void(0);" onclick="window.history.back()">
                    <i class="iconsax back-btn" data-icon="arrow-left"></i>
                </a>
                <h3>Semua Produk</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- search section starts -->
    <section>
        <div class="custom-container">
            <form class="theme-form search-head">
                <div class="form-group">
                    <div class="form-input">
                        <input type="text" class="form-control search" id="search"
                            placeholder="Cari produk disini..." />
                        <i class="iconsax search-icon" data-icon="search-normal-2"></i>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- shop section start -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="row g-3">
                @forelse ($products as $product)
                    <div class="col-6">
                        <div class="product-box">
                            <div class="product-box-img">
                                <a href="{{ route('front.product', $product->slug) }}"> <img class="img"
                                        src="{{ Storage::url($product->thumbnail) }}" alt="p1" /></a>

                                <div class="cart-box">
                                    <button class="cart-bag" data-slug="{{ $product->slug }}" data-quantity="1">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('front.product', $product->slug) }}">
                                <div class="product-box-detail">
                                    <h4>{{ $product->name }}</h4>
                                    <h5>{{ $product->category->name }}</h5>
                                    <div class="bottom-panel">
                                        <div class="price">
                                            <h4>Rp {{ number_format($product->price) }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <h2 style="color: #1A73E8" class=" text-center text-custom">Tidak ada produk.</h2>
                @endforelse
                <h2 style="color: #1A73E8" class=" text-center text-custom">{{ $products->links() }}</h2>
            </div>
        </div>
    </section>
    <!-- shop section end -->
@endsection

@push('addon-script')
    @include('includes.script-products')
@endpush
