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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Prevent form submission on enter
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

    <!-- Your other scripts -->


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
