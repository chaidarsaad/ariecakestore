 <!-- swiper js -->
 <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('assets/js/custom-swiper.js') }}"></script>

 <!-- range-slider js -->
 <script src="{{ asset('assets/js/range-slider.js') }}"></script>

 <!-- dropzone js -->
 <script src="{{ asset('assets/js/dropzone-min.js') }}"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!-- Toastify JS -->
 <script src="{{ asset('assets/js/notify.js') }}"></script>

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const addToCartBtn = document.querySelector('.cart-box-sec');

         addToCartBtn.addEventListener('click', function(event) {
             event.preventDefault();

             const productSlug = this.getAttribute('data-product-slug');

             fetch(`/add-to-cart/${productSlug}`, {
                     method: 'POST',
                     headers: {
                         'X-Requested-With': 'XMLHttpRequest',
                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                             .getAttribute('content')
                     }
                 })
                 .then(response => response.json())
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
                     const errorMessage = error.message || "Eror. Coba lagi.";
                     $.notify(errorMessage, {
                         className: 'error',
                         globalPosition: 'top left',
                         style: 'bootstrap'
                     });
                 });
         });
     });
 </script>
