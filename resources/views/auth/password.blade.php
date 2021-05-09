
<p class="mb-0 text-muted">رمز عبور خود را وارد نمایید</p>
<div class="form-group">
    <input type="password" class="form-control shadow text-center" autocomplete="off" id="password">
    <p class="text-center"><button class="btn btn-warning btn-sm mt-3" id="password-submit">تایید</button></p>
</div>
<div class="form-group mb-0">
    <p class="text-left mb-0">
        <a href="{{route('home')}}" class="mt-3 text-primary" id="login-token-password">ارسال رمز یک بار مصرف</a>
    </p>
</div>


<script>

    $("#login-token-password").on("click",function(){
        $.ajax({
            url: '{{ route("login_token_password") }}',
            type: 'POST',
            data: {"mobile":"{{ $mobile }}"},
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
            },
        });
    });

    $("#password-submit").on("click",function(){
        $(this).html(" <span class='fa fa-spinner fa-spin d-block mx-auto'></span> ");
        $.ajax({
            url: '{{ route("login_password_action") }}',
            type: 'POST',
            data: {"mobile":"{{ $mobile }}","code":$("#password").val()},
            success: function(data) {
                if(data.status == "0"){
                    Swal.fire({
                        position: 'center-center',
                        icon: 'warning',
                        text: data.desc,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }else if(data.status == "1"){
                    window.location.reload();
                }
                $("#password-submit").html("تایید");
            },
        });
    });

</script>
