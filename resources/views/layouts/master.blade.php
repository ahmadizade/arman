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
    <link rel="stylesheet" href="/css/style.css">
    @yield("extra_css")
    @yield("title")
</head>
<body>

@include("partials.header")

@yield("content")

@include("partials.footer")

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/f7ae936a05.js"></script>
<div class="modal fade" id="login-register" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ورود و ثبت نام</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div id="auth" class="modal-body">
                <p class="mb-0 text-muted">شماره موبایل خود را وارد نمایید</p>
                <div class="form-group">
                    <input type="tel" class="form-control shadow text-center" autocomplete="off" id="mobile" maxlength="11">
                    <p class="text-center"><button class="btn btn-warning btn-sm mt-3" id="mobile-submit">ورود / ثبت نام</button></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#mobile-submit").on("click",function(){
        $.ajax({
            url: '{{ route("login_token") }}',
            type: 'POST',
            data: {"mobile":$("#mobile").val()},
            success: function(data) {
                console.log(data);
                if(data.status == "0"){
                    alert(data.desc);
                }else{
                    $("#auth").html(data);
                }
            },
        });
    });
</script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/alert.js"></script>
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
</script>
@yield('extra_js')
</body>
</html>
