$(document).ready(function () {

    loadpost();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadpost()
    {
        $.ajax({
            method: "GET",
            url: "/load-pos-data",
            success: function (response) {
                $('.pos-count').html('');
                $('.pos-count').html(response.count);
            }
        });
    }


    $('.addToPosBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-pos",
            data: {
                'product_id': product_id,
                'product_qty' : product_qty,
            },
            success: function (response) {
                swal(response.status);
                loadpost();
            }
        });

    });

    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $(document).on('click','.decrement-btn', function (e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    // $('.delete-pos-item').click(function (e) {
    $(document).on('click','.delete-pos-item', function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete-pos-item",
            data: {
                'prod_id':prod_id,
            },
            success: function (response) {
                // window.location.reload();
                loadpost();
                $('.positems').load(location.href + " .positems");
                swal("", response.status, "success");
            }
        });
    });

    $(document).on('click','.changeQuantity', function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id' : prod_id,
            'prod_qty' : qty,
        }
        $.ajax({
            method: "POST",
            url: "update-pos",
            data: data,
            success: function (response) {
                $('.positems').load(location.href + " .positems");
                // window.location.reload();
            }
        });

    });

});
