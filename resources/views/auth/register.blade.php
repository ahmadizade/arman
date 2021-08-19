@extends("layouts.master")

@section("title")
    <title>فرم ثبت نام | Arman</title>
@endsection

@section("content")




    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>به فروشگاه آرمان خوش آمدید</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>فرم ثبت نام</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Profile Authentication Area -->
    <section class="profile-authentication-area ptb-70">
        <div class="container">
            <div id="inputMobile" class="row justify-content-center">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="login-form">
                        <h2>ثبت نام</h2>

                        <form id="registerForm" action="#">
                            <div class="form-group">
                                <label>شماره موبایل خود را وارد کنید</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="مثلا : 1234567-0912">
                            </div>


                            <div class="form-row mt-2">
                                <div class="custom-control custom-checkbox float-right mt-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="customCheck3" >
                                    <label class="custom-control-label text-justify" for="customCheck3">
                                        <a class="text-danger" href="{{route('policy')}}">حریم خصوصی</a> و <a href="{{route('policy')}}">شرایط و قوانین</a> استفاده از سرویس
                                        های سایت آرمان را مطالعه نموده و با کلیه موارد آن موافقم.
                                    </label>
                                </div>
                            </div>




                            <button id="register" type="submit">دریافت کد یکبار مصرف</button>
                        </form>
                    </div>
                </div>
            </div>



            <div id="verifiedCode" class="row justify-content-center d-none">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="login-form">
                        <h2>تایید شماره همراه</h2>
                        <div class="mb-2">
                            برای شماره همراه <span id="mobileNumber"></span> کد تایید ارسال گردید
                        </div>
                        <form id="verified_code_form" action="#">
                            <div class="form-group">
                                <label>نام خود را وارد کنید</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="مثلا : حمیدرضا">
                            </div>
                            <div class="form-group">
                                <label>نام خانوادگی خود را وارد کنید</label>
                                <input type="text" class="form-control" id="family" name="family" placeholder="مثلا : اکبرپور">
                            </div>

                            <div class="form-group">
                                <label>کد را وارد کنید</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="مثلا : 12345">
                            </div>

                            <button type="button" id="send_code" class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="mdi mdi-account-circle-outline"></i>
                                ثبت نام در آرمان
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Profile Authentication Area -->



@endsection

@section('extra_js')
    <script>
        $( document ).ready(function() {
            $('#register').click(function (e) {
                e.preventDefault();
                $.ajax({
                    'url' : '{{route('register_action')}}',
                    'type' : "POST",
                    'data' : $('#registerForm').serialize(),
                    success : function (data) {
                        if(data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        if(data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                text: data.desc,
                                title: 'فروشگاه آرمان ',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                setTimeout(function(){
                                    $('#mobileNumber').text(data.mobile);
                                    $('#inputMobile').addClass('d-none');
                                    $('#verifiedCode').removeClass('d-none');
                                },1500);
                            });
                        }
                    }
                })
            });
        });
    </script>

    <script>
        $( document ).ready(function() {
            $('#resend_sms').click(function () {
                var timeleft = 10;
                var downloadTimer = setInterval(function(){
                    if(timeleft <= 0){
                        clearInterval(downloadTimer);
                        document.getElementById("countdown").innerHTML = "ارسال شد";
                    } else {
                        document.getElementById("countdown").innerHTML = timeleft;
                    }
                    timeleft -= 1;
                }, 1000);
            });

        });
    </script>

    <script>
        $( document ).ready(function() {
            $('#send_code').on( "click", function (e) {
                e.preventDefault();
                $mobile = $('#mobileNumber').text();
                $name = $('#name').val();
                $family = $('#family').val();
                $code = $('#code').val();
                $.ajax({
                    'url' : "{{route('verified_code_action')}}",
                    'type' : 'POST',
                    'data' : { "code" : $code , "name" : $name , "family" : $family , "mobile" : $mobile},
                    success : function (data) {
                        if(data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        if(data.status == "1") {
                            window.location.replace('{{route('home')}}');
                        };
                    }
                })
            });
        });
    </script>
@endsection

