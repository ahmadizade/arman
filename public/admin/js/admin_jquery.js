$(document).ready(function () {
    $('.user_id').select2({
        width: '100%',
        closeOnSelect: true,
        // minimumInputLength: 1,
        placeholder: 'انتخاب کاربر',
        language: "fa",
        dir: "rtl",
        ajax: {
            url: '/tahator/credit-suggestion-action',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name + "  /  " + "شماره همراه : " + "  " + item.mobile + "  /  " + "اعتبار = " + item.credit,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true,
        }
    }).on('select2:selecting', function (e) {
        $.ajax({
            type: 'post',
            url: '/tahator/credit-show-action',
            data: e.params.args.data,
            success(response) {
                if (response['credit'] !== 0) {
                    $('#current-credit-credit').html(response['credit']).css({
                        'background-color': 'green',
                        'color': 'white',
                        'padding': '0 2px'
                    });
                    $('#current-credit-Name').html(response['name']);
                    $('#current-credit-Mobile').html(response['mobile']);
                    $('#current-credit-Status').html(response['status']);
                }
            }
        });
    });
    $('#sum,#minus').click(function (e) {
        if (this.id == 'sum') {
            $operation = 'sum'
        } else {
            $operation = 'minus'
        }
        $.ajax({
            type: 'post',
            url: '/tahator/credit-charge-action',
            data: {'operation': $operation, 'user_id': $('#user_id').val(), 'new_credit': $('#new-credit').val()},
            success: function (response) {
                if (response['sum'] == 'done') {
                    $("#result-msg").html('اعتبار کاربر' + ' ' + response['credit'] + ' ' + ' ریال ' + ' ' + ' شارژ شد. ');
                    $('#current-credit-credit').html(response['credit_now']).css({
                        'background-color': 'green',
                        'color': 'white',
                        'padding': '0 2px'
                    });
                    $("#result-msg").show();
                    $("#result-error").hide();
                }
                if (response['minus'] == 'done') {
                    $("#result-msg").html('اعتبار کاربر' + ' ' + response['credit'] + ' ' + ' ریال ' + ' ' + ' کسر شد. ');
                    $('#current-credit-credit').html(response['credit_now']).css({
                        'background-color': 'red',
                        'color': 'white',
                        'padding': '0 2px'
                    });
                    $("#result-msg").show();
                    $("#result-error").hide();
                } else {
                    $.each(response.errors, function (i, item) {
                        $("#result-error").html('<p class="text-danger">' + response.errors[i] + '</p>');
                        $("#result-msg").hide();
                        $("#result-error").show();
                    });
                }
            }
        });
        e.preventDefault(e);
    });


    $('.product_id').select2({
        width: '100%',
        closeOnSelect: true,
        minimumInputLength: 3,
        placeholder: 'جستجوی کالا',
        language: "fa",
        dir: "rtl",
        ajax: {
            url: '/tahator/product/product-suggestion-action',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.product_name + "  --  " + "از دسته : " + "  " + item.category,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true,
        }
    }).on('select2:selecting', function (e) {
        $.ajax({
            type: 'post',
            url: '/tahator/product/product-show-action',
            data: e.params.args.data,
            success: function (data) {
                $('#data-id').val(data['id'])
                $('#data-image').attr("src", '/uploads/products/' + data['image']);
                $('#data-product_name').val(data['product_name']);
                // $('#data-product_desc').html(data['product_desc']);
                $('#data-price').val(data['price']);
                $('#data-discount').val(data['discount'] + "%");
                $('#data-stock').val(data['stock']);
                $('#data-status').val(data['status']);
                $('#data-quantity').val(data['quantity']);
                $('#data-city').val(data['city']);
                $('#data-mobile').val(data['mobile']);
                $('#data-view').val(data['view']);
                $('#data-created_at').val(data['created_at']);
                $('#data-updated_at').val(data['updated_at']);
            }
        });
    });
    $('#save-product').click(function () {
        let id = $('#data-id').val();
        if (id == "") {
            alert('ابتدا کالای خود را جستجو و انتخاب کنید')
        }else {
            let status = $('#data-status').val();
            $.ajax({
                type: 'post',
                url: '/tahator/product/product-save-action',
                data: ({id: id, status: status}),
                success: function (response) {
                    alert(response['status']);
                }
            });
        }
    });
});
