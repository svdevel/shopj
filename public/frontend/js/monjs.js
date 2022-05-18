$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.addToPanierBtn').click(function (e) {
        e.preventDefault();

        var article_id = $(this).closest('.article_data').find('.article_id').val();
        var article_qty = $(this).closest('.article_data').find('.qty-input').val();

        $.ajax({
            method: "POST",
            url: "/add-to-panier",
            data: {
                'article_id': article_id,
                'article_qty': article_qty,
            },
            success: function (response) {
                swal(response.status);
                loadcart();
            }
        });
        // alert(article_id);
        // alert(article_qty);
    });

   

    $('.increment-btn').click(function (e) {
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.article_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.article_data').find('.qty-input').val(value);
        }
    });


    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var dec_value = $(this).closest('.article_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.article_data').find('.qty-input').val(value);
        }
    });


    $('.delete-panier-item').click (function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var article_id = $(this).closest('.article_data').find('.article_id').val();
        $.ajax({
            method: "POST",
            url: "delete-panier-item",
            data: {
                'article_id':article_id,
            },
            success: function (response) {
                window.location.reload();
               
                $('.panieritems').load(location.href + " .paniertems");
                swal("", response.status, "success");
            }
        });
    });



    $('.changeQty').click (function (e) {
        e.preventDefault();

        var article_id = $(this).closest('.article_data').find('.article_id').val();
        var qty = $(this).closest('.article_data').find('.qty-input').val();
        data = {
            'article_id' : article_id,
            'article_qty' : qty,
        }
        $.ajax({
            method: "POST",
            url: "update-panier",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });

    });
});
