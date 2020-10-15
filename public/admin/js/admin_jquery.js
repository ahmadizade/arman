$(document).ready(function () {

    $('.itemName').select2({
        placeholder: 'انتخاب کاربر',
        language: "fa",
        dir: "rtl",
        ajax: {
            url: '/tahator/credit-suggestion-action',
            dataType: 'json',
            delay: 250,
            success(response) {
                $('#test').html(response);
            },
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
    });

    $('#itemName').change(function () {
        $.ajax({
            type: 'post',
            url: '/tahator/credit-show-action',
            data: {'id': $('#itemName').select2().val()},
            success(response) {
                if (response['credit'] !== 0) {
                    console.log(response);
                    $('#current-credit-credit').html(response['credit']).css({'background-color' : 'green' , 'color' : 'white' , 'padding' : '0 2px'});
                    $('#current-credit-Name').html(response['name']);
                    $('#current-credit-Mobile').html(response['mobile']);
                    $('#current-credit-Status').html(response['status']);
                } else {
                    $('#result-error').html("اعتباری ثبت نشده است")
                }
            }
        });
    });

        //sum
        $('#sum').click(function (e) {
            $.ajax({
                type: 'post',
                url: '/tahator/credit-charge-action',
                data: $('#credit-charge-form').serialize(),
                success: function (response) {
                    console.log(response)
                    if (response['sum'] == 'done') {
                        $("#result-msg").html('اعتبار کاربر' + ' ' + response['sum_credit'] + ' ' + ' ریال ' + ' ' + ' شارژ شد. ');
                        $('#current-credit-credit').html(response['credit_now']).css({'background-color' : 'green' , 'color' : 'white' , 'padding' : '0 2px'});
                        $('#current-credit-credit').html(response['credit']).css({'background-color' : 'green' , 'color' : 'white' , 'padding' : '0 2px'});
                    } else {
                        $.each(response.errors, function (i, item) {
                            $("#result-error").html('<p class="text-danger">' + response.errors[i] + '</p>');
                        });
                        $("#result-error").show();
                    }
                }
            });
            e.preventDefault(e);
        });
});
