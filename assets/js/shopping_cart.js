(function ($) {
    "use strict"; // Start of use strict

    $(document).ready(function () {
        $('.available_colors').click(function () {
            $('.available_colors').removeClass("active");
            $(this).addClass("active");
            $("#selected_color").val($(this).attr("color_id"));
            $("#selected_color_name").val($(this).attr("color_name"));

        });
        $('.get_location').click(function () {
            $.ajax({
                    url: "//freegeoip.net/json/",
                    method: "POST",
                    dataType: "jsonp",
                    success: function (location)
                    {
                        alert(location.city);
                    }
                });
            
        });

        $('.btn-add-cart').click(function () {
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var product_price = $(this).data("price");
            var product_uri = $(this).data("uri");
            var quantity = $('.' + product_id).val();
//            var product_size_id = $('#product_size').val();
//            var product_size_code = $('#product_size option:selected').text();
//            var color = $("#selected_color").val();
//            var product_color_name = $("#selected_color_name").val();
            var product_code = $("#product_code").val();
            var product_image = $("#featured_image").val();

            if (quantity != '' && quantity > 0)
            {
                var base_url = $("#base_url").val();
                $.ajax({
                    url: base_url + "shopping_cart/add",
                    method: "POST",
                    data: {product_id: product_id, product_name: product_name,
                        product_price: product_price, quantity: quantity,
//                        product_size_id: product_size_id, product_size_code: product_size_code,
//                        product_color: color,
//                        product_color_name: product_color_name,
                        product_code: product_code,
                        product_image: product_image, product_uri: product_uri
                    },
                    success: function (data)
                    {
//                        alert("Product Added into Cart");
                        var obj = JSON.parse(data);
                        alert("Item added to shopping cart");
                        $("#cart_icon_heading").html(obj.total_items + " items - PKR " + obj.total_amount);
                        $("#cart_icon_flag").html(obj.total_items);
//                        $('#cart-block').html(data);
                        $('#' + product_id).val('');
                    }
                });
            } else
            {
                alert("Please Enter quantity");
            }
        });

        $(document).on('click', '.remove_inventory', function () {
            var row_id = $(this).data("rowid");
            if (confirm("Are you sure you want to remove this?"))
            {
                var base_url = $("#base_url").val();
                $.ajax({
                    url: base_url + "shopping_cart/remove",
                    method: "POST",
                    data: {row_id: row_id},
                    success: function (data)
                    {
                        var obj = JSON.parse(data);
                        $("#row_" + row_id).hide();
                        $("#product_total").html(obj.total_amount);
                        $("#grand_total").html(obj.total_amount);
//                        alert("Product removed from Cart");
//                        $('#cart_details').html(data);
                    }
                });
            } else
            {
                return false;
            }
        });

        $(document).on('click', '.qty_up', function () {
            var id = $(this).attr("data");
            $("#qty_" + id).val(parseInt($("#qty_" + id).val()) + 1);
            var qty = $("#qty_" + id).val();
            var rowid = $(this).data("rowid");
            var base_url = $("#base_url").val();
            update_cart(base_url, rowid, qty);

        });
        $(document).on('click', '.qty_down', function () {
            var id = $(this).attr("data");
            if (parseInt($("#qty_" + id).val()) !== 1) {
                $("#qty_" + id).val(parseInt($("#qty_" + id).val()) - 1);
            }
            var qty = $("#qty_" + id).val();
            var rowid = $(this).data("rowid");
            var base_url = $("#base_url").val();
            update_cart(base_url, rowid, qty);
        });
        function update_cart(base_url, rowid, qty) {
            $.ajax({
                url: base_url + "shopping_cart/update_cart",
                method: "POST",
                data: {rowid: rowid,
                    quantity: qty
                },
                success: function (data)
                {
                    alert("Cart updated");
                    location.reload();
//                        $('#cart-block').html(data);
//                    $('#' + product_id).val('');
                }
            });
        }
    });

})(jQuery); // End of use strict