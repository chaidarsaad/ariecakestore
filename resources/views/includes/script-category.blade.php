 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
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
                             $.notify(
                                 "Produk gagal ditambahkan. Coba lagi.", {
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
