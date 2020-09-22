@if(Cache::has("mobile_code_".$mobile))
    <p class="mb-0 text-muted">کد ارسالی به موبایل را وارد نمایید</p>
    <div class="form-group">
        <input type="tel" class="form-control shadow text-center" autocomplete="one-time-code" placeholder="- - - - -" id="code" maxlength="5">
        <p class="text-center"><button class="btn btn-warning btn-sm mt-3" id="code-submit">تایید</button></p>
    </div>
@endif

<script>
    $("#code-submit").on("click",function(){
        $.ajax({
            url: '{{ route("login_token_action") }}',
            type: 'POST',
            data: {"mobile":"{{ $mobile }}","code":$("#code").val()},
            success: function(data) {
                if(data.status == "0"){
                    alert(data.desc);
                }else{
                    window.location.reload();
                }
            },
        });
    });
</script>
