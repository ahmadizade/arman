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
}).on('select2:selecting', function(e) {
        $.ajax({
            type: 'post',
            url: '/tahator/credit-show-action',
            data: e.params.args.data,
            success(response) {
                if (response['credit'] !== 0) {
                    $('#current-credit-credit').html(response['credit']).css({'background-color' : 'green' , 'color' : 'white' , 'padding' : '0 2px'});
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
            }else{
                $operation = 'minus'
            }
            $.ajax({
                type: 'post',
                url: '/tahator/credit-charge-action',
                data: {'operation' : $operation , 'user_id' : $('#user_id').val(), 'new_credit' : $('#new-credit').val()},
                success: function (response) {
                    if (response['sum'] == 'done') {
                        $("#result-msg").html('اعتبار کاربر' + ' ' + response['credit'] + ' ' + ' ریال ' + ' ' + ' شارژ شد. ');
                        $('#current-credit-credit').html(response['credit_now']).css({'background-color' : 'green' , 'color' : 'white' , 'padding' : '0 2px'});
                        $("#result-msg").show();
                        $("#result-error").hide();
                    }
                     if (response['minus'] == 'done') {
                        $("#result-msg").html('اعتبار کاربر' + ' ' + response['credit'] + ' ' + ' ریال ' + ' ' + ' کسر شد. ');
                        $('#current-credit-credit').html(response['credit_now']).css({'background-color' : 'red' , 'color' : 'white' , 'padding' : '0 2px'});
                         $("#result-msg").show();
                         $("#result-error").hide();
                     }else {
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
});
