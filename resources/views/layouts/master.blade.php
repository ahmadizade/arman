<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    @yield("title")
    @yield("header")
</head>
<body>

@yield("content")

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<div class="modal fade" id="login-register" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ورود و ثبت نام</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                if(data == 0){
                    alert("شماره موبایل اشتباه می باشد");
                }else{
                    alert("sik shod");
                }
            },
        });
    });
</script>

@yield("footer")
</body>
</html>
