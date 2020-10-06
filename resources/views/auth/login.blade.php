@if(Cache::has("mobile_code_".$mobile))
    <p class="mb-0 text-muted">کد ارسالی به موبایل را وارد نمایید</p>
    <div class="form-group mb-0">
        <input type="tel" class="form-control shadow text-center" autocomplete="one-time-code" placeholder="- - - - -" id="code" maxlength="5">
        <p class="text-center mb-0"><button class="btn btn-warning btn-sm mt-3" id="code-submit">تایید</button></p>
    </div>
@endif

<script>
    $("#code-submit").on("click",function(){
        $("#code-submit").html(" <span class='fa fa-spinner fa-spin d-block mx-auto'></span> ");
        $.ajax({
            url: '{{ route("login_token_action") }}',
            type: 'POST',
            data: {"mobile":"{{ $mobile }}","code":$("#code").val()},
            success: function(data) {
                if(data.status == "0"){
                    Swal.fire({
                        position: 'center-center',
                        icon: 'warning',
                        text: data.desc,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }else if(data.status == "-1") {
                    Swal.fire({
                        position: 'center-center',
                        icon: 'warning',
                        text: data.desc,
                        showConfirmButton: false,
                        timer: 2000
                    })
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    window.location.reload();
                }
                $("#code-submit").html("تایید");
            },
        });
    });
</script>
