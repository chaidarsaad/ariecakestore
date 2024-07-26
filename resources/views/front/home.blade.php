@extends('layouts.front')

@section('title')
    Arie Cake Store | Home
@endsection

@push('addon-style')
    {{-- addon style --}}
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}" />
@endpush

@section('content')
    <!-- side bar start -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-body">
            <div class="sidebar-content">
                <ul class="link-section">
                    <li>
                        <div class="pages">
                            <h4>Mode Gelap</h4>
                            <div class="switch-btn">
                                <input id="dark-switch" type="checkbox" />
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- side bar end -->

    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header">
                <div class="head-content">
                    <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
                        <i class="iconsax menu-icon" data-icon="menu-hamburger"></i>
                    </button>

                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- search section starts -->
    <section>
        <div class="custom-container">
            <form class="theme-form search-head" id="search-form">
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

    <!-- banner section start -->
    <section class="banner-wapper">
        <div class="custom-container">
            <div class="banner-bg">
                @if ($banner1 != null)
                    <img class="img-fluid img-bg w-100" src="{{ Storage::url($banner1->image) }}" alt="banner-1" />
                @endif
            </div>
        </div>
    </section>
    <!-- banner section start -->

    <!-- categories section start -->
    <section>
        <div class="custom-container">
            <div class="swiper categories">
                <div class="swiper-wrapper ratio_square">
                    <div class="swiper-slide">
                        <a href="{{ route('front.categories') }}" class="categories-item active">
                            <h4>Semua</h4>
                        </a>
                    </div>
                    @forelse ($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('front.category', $category->slug) }}" class="categories-item text-center">
                                <h4>{{ $category->name }}</h4>
                            </a>
                        </div>
                    @empty
                        <h2 style="color: #1A73E8" class=" text-center text-custom">Tidak ada kategori.</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- categories section end -->

    <!-- New Arrivals section start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h2>Produk Baru</h2>
                <a href="{{ route('front.all-products') }}">Lihat Semua Produk</a>
            </div>

            <div class="row g-3">
                @forelse ($newArrivals as $nwa)
                    <div class="col-6">
                        <div class="product-box">
                            <div class="product-box-img">
                                <a href="{{ route('front.product', $nwa->slug) }}">
                                    <img class="img" src="{{ Storage::url($nwa->thumbnail) }}" alt="p2" />
                                </a>

                                <div class="cart-box">
                                    <button class="cart-bag" data-slug="{{ $nwa->slug }}" data-quantity="1">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </button>
                                </div>
                            </div>

                            <a href="{{ route('front.product', $nwa->slug) }}">
                                <div class="product-box-detail">
                                    <h4>{{ $nwa->name }}</h4>
                                    <h5>{{ $nwa->category->name }}</h5>
                                    <div class="bottom-panel">
                                        <div class="price">
                                            <h4>Rp {{ number_format($nwa->price) }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                @empty
                    <h2 style="color: #1A73E8" class=" text-center text-custom">Tidak ada produk.</h3>
                @endforelse
            </div>
        </div>
    </section>
    <!-- New Arrivals section end -->

    <!-- Trending Product section start -->
    @if ($trendingProducts->isNotEmpty())
        <section class="section-t-space">
            <div class="custom-container">
                <div class="title">
                    <h2>Produk Trending</h2>
                </div>

                <div class="row g-3">
                    @foreach ($trendingProducts as $trp)
                        <div class="col-12">
                            <div class="horizontal-product-box">
                                <a href="{{ route('front.product', $trp->slug) }}" class="horizontal-product-img">
                                    <img class="img-fluid img" src="{{ Storage::url($trp->thumbnail) }}" alt="p3" />
                                </a>
                                <div class="horizontal-product-details">
                                    <a href="{{ route('front.product', $trp->slug) }}">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4>{{ $trp->name }}</h4>
                                        </div>
                                        <h5>{{ $trp->category->name }}</h5>
                                    </a>


                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <a href="{{ route('front.product', $trp->slug) }}">
                                            <div class="d-flex align-items-center gap-2">
                                                <h3 class="fw-semibold">Rp {{ number_format($trp->price) }}</h3>
                                            </div>
                                        </a>
                                        <button class="cart-bag" data-slug="{{ $trp->slug }}" data-quantity="1">
                                            <i class="iconsax bag" data-icon="basket-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- Trending product section end -->

    <!-- banner section start -->
    <section class="banner-wapper">
        <div class="custom-container">
            <div class="banner-bg">
                @if ($banner2 != null)
                    <img class="img-fluid img-bg w-100" src="{{ Storage::url($banner2->image) }}" alt="banner-2" />
                @endif
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- other product section start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h2>Mungkin kamu suka</h2>
            </div>

            <div class="row g-4">
                @foreach ($randomProducts as $rndmp)
                    <div class="col-6">
                        <div class="product-box">
                            <div class="product-box-img">
                                <a href="{{ route('front.product', $rndmp->slug) }}"> <img class="img"
                                        src="{{ Storage::url($rndmp->thumbnail) }}" alt="p11" /></a>

                                <div class="cart-box">
                                    <button class="cart-bag" data-slug="{{ $rndmp->slug }}" data-quantity="1">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('front.product', $rndmp->slug) }}">
                                <div class="product-box-detail">
                                    <h4>{{ $rndmp->name }}</h4>
                                    <div class="d-flex justify-content-between gap-3">
                                        <h5>{{ $rndmp->category->name }}</h5>
                                    </div>
                                    <h3 class="fw-semibold">Rp {{ number_format($rndmp->price) }}</h3>
                                </div>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- other product section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection

@push('addon-script')
    {{-- addon script --}}
    <!-- swiper js -->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-swiper.js') }}"></script>

    <!-- range-slider js -->
    <script src="{{ asset('assets/js/range-slider.js') }}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.css"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    {{-- typeahead --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search-form').on('submit', function(e) {
                e.preventDefault();
            });

            var route = "{{ url('autocomplete-search') }}";

            $('#search').typeahead({
                source: function(query, process) {
                    return $.get(route, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                },
                updater: function(item) {
                    window.location.href = "/product/" + item.slug;
                    return item;
                }
            });
        });
    </script>

    <!-- Toastify JS -->
    <script src="{{ asset('assets/js/notify.js') }}"></script>

    {{-- script toastify --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.cart-bag').forEach(button => {
                button.addEventListener('click', function() {
                    const slug = this.dataset.slug;
                    const quantity = this.dataset.quantity;

                    fetch(`{{ route('front.cart-add', '') }}/${slug}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                quantity: quantity
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(data => {
                                    throw data;
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                $.notify("Produk ditambahkan ke keranjang", {
                                    className: 'success',
                                    globalPosition: 'top left',
                                    style: 'bootstrap'
                                });
                            } else {
                                $.notify("Produk gagal ditambahkan. Coba lagi.", {
                                    className: 'error',
                                    globalPosition: 'top left',
                                    style: 'bootstrap'
                                });
                            }
                        })
                        .catch(error => {
                            const errorMessage = error.message ||
                                "Eror. Coba lagi.";
                            $.notify(errorMessage, {
                                className: 'error',
                                globalPosition: 'top left',
                                style: 'bootstrap'
                            });
                        });
                });
            });
        });
    </script>
    {{-- end script toastify --}}
@endpush
