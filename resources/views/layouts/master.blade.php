<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/css/style.css?57986">
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    @yield("extra_css")
    @yield("title")
</head>
<body>

@include("partials.header")

@yield("content")

@include("partials.footer")

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/fontawesome.js"></script>

<div class="modal fade" id="search-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">جستجو کنید ..</h5>
            </div>
            <div id="auth" class="modal-body">
                <div class="form-group mb-0 pt-1 pb-5">
                    <select type="text" class="search form-control"></select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="login-register">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">ورود و ثبت نام</h5>
            </div>
            <div id="auth" class="modal-body">
                <img src="{{ asset('images/icon/login.png') }}" alt="login" class="mx-auto img-fluid my-2 d-block">
                <p class="text-muted text-center">شماره موبایل خود را وارد نمایید</p>
                <div class="form-group mb-0">
                    <input type="tel" class="form-control shadow text-center" autocomplete="off" id="mobile" maxlength="11">
                    <p class="text-center mb-0"><button class="btn btn-warning btn-sm mt-3" id="mobile-submit">ورود / ثبت نام</button></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#mobile-submit").on("click",function(){
        $(this).html(" <span class='fa fa-spinner fa-spin d-block mx-auto'></span> ");
        $.ajax({
            url: '{{ route("login_token") }}',
            type: 'POST',
            data: {"mobile":$("#mobile").val()},
            success: function(data) {
                if(data.status == "0"){
                    Swal.fire({
                        position: 'center-center',
                        icon: 'warning',
                        text: data.desc,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }else{
                    $("#auth").html(data);
                }
                $("#mobile-submit").html("ورود / ثبت نام");
            },
        });
    });
</script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/main.js?57986"></script>
<script src="/js/alert.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/fa.min.js"></script>
<script>
    $('body').on("keypress","#mobile",function(event) {
        if (event.keyCode == 13 || event.which == 13) {
            $("#mobile-submit").click();
            event.preventDefault();
        }
    });
    $('body').on("keypress","#code",function(event) {
        if (event.keyCode == 13 || event.which == 13) {
            $("#code-submit").click();
            event.preventDefault();
        }
    });
    $('body').on("keypress","#password",function(event) {
        if (event.keyCode == 13 || event.which == 13) {
            $("#password-submit").click();
            event.preventDefault();
        }
    });
</script>
<script>

    $('.search').select2({
        width: '100%',
        closeOnSelect: true,
        minimumInputLength: 2,
        placeholder: 'جستجوی فروشگاه ...',
        language: "fa",
        dir: "rtl",
        ajax: {
            url: "{{ route("search") }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text:"فروشگاه " + item.shop + " " + (item.branch != null ? item.branch : ""),
                            id: item.id,
                            value: item.shop_slug + "/" + item.branch_slug
                        }
                    })
                };
            },
            cache: true,
        }
    }).on('select2:select', function (e) {
        window.location.href = "/shop/"+e.params.data.value;
    });

</script>
@yield('extra_js')
</body>
</html>
