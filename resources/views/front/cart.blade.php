@extends('layouts.front')

@section('title')
    Arie Cake Store | Keranjang
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
                <h3>Keranjangku</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- cart section start -->
    <section>
        <div class="custom-container">
            <ul class="horizontal-product-list">
                @php
                    $totalPrice = 0;
                @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $slug => $details)
                        @php
                            $totalPrice += $details['price'] * $details['quantity'];
                        @endphp
                        <li class="cart-product-box" data-slug="{{ $slug }}">
                            <div class="horizontal-product-box">
                                <div class="horizontal-product-img">
                                    <a href="{{ route('front.product', $details['slug']) }}">
                                        <img class="img-fluid img" src="{{ Storage::url($details['thumbnail']) }}"
                                            alt="p11" />
                                    </a>
                                </div>
                                <div class="horizontal-product-details">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4>{{ $details['name'] }}</h4>
                                        <a href="#" class="remove-from-cart rating d-flex align-items-center"
                                            data-slug="{{ $details['slug'] }}">
                                            <i class="iconsax trash" data-icon="trash"></i>
                                        </a>
                                    </div>

                                    <ul class="product-info">
                                        <li>Jumlah: <span class="quantity">{{ $details['quantity'] }}</span></li>
                                    </ul>
                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <h3 class="fw-semibold">Rp {{ number_format($details['price']) }}</h3>
                                        </div>
                                        <div class="plus-minus">
                                            <button class="sub plus-minus-button" data-action="subtract"
                                                data-slug="{{ $details['slug'] }}"
                                                {{ $details['quantity'] == 1 ? 'disabled' : '' }}>
                                                <i class="iconsax" data-icon="minus"></i>
                                            </button>
                                            <input type="number" value="{{ $details['quantity'] }}" min="1"
                                                class="quantity-input" data-slug="{{ $details['slug'] }}"
                                                data-price="{{ $details['price'] }}" data-name="{{ $details['name'] }}" />

                                            <button class="add plus-minus-button" data-action="add"
                                                data-slug="{{ $details['slug'] }}">
                                                <i class="iconsax" data-icon="add"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </section>
    <!-- cart section end -->

    <!-- cart bottom start -->
    @if (session('cart'))
        <div class="pay-popup">
            <div class="price-items">
                <h6>Total Harga</h6>
                <h2 id="total-price">Rp {{ number_format($totalPrice) }}</h2>
            </div>
            <a id="checkout-btn" class="btn btn-lg theme-btn pay-btn mt-0" href="#">Pesan</a>
        </div>
    @endif
    <!-- cart bottom end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection

@push('addon-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.remove-from-cart').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    var slug = this.dataset.slug;

                    fetch(`/cart/remove/${slug}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.closest('.cart-product-box').remove();

                                document.getElementById('total-price').innerText =
                                    `Rp ${data.totalPrice.toLocaleString()}`;

                                if (document.querySelectorAll('.cart-product-box').length ===
                                    0) {
                                    location.reload();
                                }
                            } else {
                                alert('Gagal menghapus produk dari keranjang.');
                            }
                        });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let isUpdating = false;

            function updateCart(slug, quantity) {
                if (isUpdating) return;
                isUpdating = true;

                fetch(`/cart/update/${slug}`, {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        isUpdating = false;
                        if (data.success) {
                            const productBox = document.querySelector(`.cart-product-box[data-slug="${slug}"]`);
                            const quantitySpan = productBox.querySelector('.quantity');
                            const quantityInput = productBox.querySelector('.quantity-input');
                            const minusButton = productBox.querySelector('.sub.plus-minus-button');

                            quantitySpan.innerText = quantity;
                            quantityInput.value = quantity;
                            document.getElementById('total-price').innerText =
                                `Rp ${data.totalPrice.toLocaleString()}`;

                            if (quantity == 1) {
                                minusButton.setAttribute('disabled', 'disabled');
                            } else {
                                minusButton.removeAttribute('disabled');
                            }
                        } else {
                            alert('Gagal memperbarui kuantitas produk.');
                        }
                    })
                    .catch(error => {
                        console.error('Error updating cart:', error);
                        isUpdating = false;
                    });
            }

            document.querySelectorAll('.plus-minus-button').forEach(button => {
                button.addEventListener('click', function() {
                    const action = this.dataset.action;
                    const slug = this.dataset.slug;
                    const quantityInput = document.querySelector(
                        `input.quantity-input[data-slug="${slug}"]`);
                    let currentQuantity = parseInt(quantityInput.value);

                    if (action === 'add') {
                        quantityInput.value = currentQuantity + 0;
                    } else if (action === 'subtract' && currentQuantity > 1) {
                        quantityInput.value = currentQuantity - 0;
                    }

                    updateCart(slug, quantityInput.value);
                });
            });

            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const slug = this.dataset.slug;
                    let quantity = parseInt(this.value);

                    updateCart(slug, quantity);
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkoutBtn = document.getElementById('checkout-btn');

            checkoutBtn.addEventListener('click', function(e) {
                e.preventDefault();

                // Ambil nilai dari input quantity
                const cart = {};
                document.querySelectorAll('.plus-minus').forEach(element => {
                    const slug = element.querySelector('.quantity-input').getAttribute('data-slug');
                    const quantity = parseInt(element.querySelector('.quantity-input').value);
                    const price = parseFloat(element.querySelector('.quantity-input').getAttribute(
                        'data-price'));
                    const name = element.querySelector('.quantity-input').getAttribute('data-name');

                    if (slug && !isNaN(quantity) && !isNaN(price)) {
                        cart[slug] = {
                            slug,
                            quantity,
                            price,
                            name
                        };
                    }
                });

                // Validasi dan debugging
                if (Object.keys(cart).length === 0) {
                    alert('Keranjang kosong atau data tidak valid.');
                    return;
                }

                let message =
                    'Halo Arie Cake, Saya ingin melakukan pemesanan dengan detail sebagai berikut:\n\n';
                let totalPrice = 0;
                for (const [slug, details] of Object.entries(cart)) {
                    const itemTotal = details.price * details.quantity;
                    totalPrice += itemTotal;
                    message +=
                        `*${details.name}* - Harga: Rp ${details.price.toLocaleString()} - *Jumlah: ${details.quantity}* - Total: Rp ${itemTotal.toLocaleString()}\n`;
                }

                message += `\n*Total Harga: Rp ${totalPrice.toLocaleString()}*`;

                const encodedMessage = encodeURIComponent(message);
                const whatsappUrl = `https://wa.me/+6285257436005?text=${encodedMessage}`;

                fetch("{{ route('cart.clear') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = whatsappUrl;
                            setTimeout(() => {
                                location.reload();
                            }, 5000);
                        } else {
                            alert('Gagal mengosongkan keranjang.');
                        }
                    })
                    .catch(error => {
                        console.error('Error clearing cart:', error);
                        alert('Gagal mengosongkan keranjang.');
                    });
            });
        });
    </script>
@endpush
