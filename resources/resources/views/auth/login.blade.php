@extends("layouts.master")

@section("title")
    <title>ورود به سایت | Arman</title>
@endsection

@section("content")

    <!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>به وب سایت آرمان خوش آمدید</h1>
            <ul>
                <li><a href="{{route('home')}}">خانه</a></li>
                <li><a href="{{route('home')}}">دسته بندی محصولات</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Profile Authentication Area -->
<section class="profile-authentication-area ptb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-6">
                <div class="login-form">
                    <h2>ورود</h2>

                    <form id="loginForm">
                        <div class="form-group">
                            <label>نام کاربری یا پست الکترونیک</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="شماره موبایل خود را وارد نمایید">
                        </div>

                        <div class="form-group">
                            <label>کلمه عبور</label>
                            <input id="code" name="code" type="password" class="form-control" placeholder="رمز عبور خود را وارد نمایید">
                        </div>

                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                <p>
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">مرا به خاطر بسپار</label>
                                </p>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                                <a href="{{route('register')}}" class="lost-your-password">هنوز ثبت نام نکرده اید؟</a>
                            </div>
                        </div>

                        <button id="login" type="submit">ورود</button>
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
        $('#login').click(function (e) {
            e.preventDefault();
            $.ajax({
                'url' : '{{route('login_action')}}',
                'type' : "POST",
                'data' : $('#loginForm').serialize(),
                success : function (data) {
                    console.log(data)
                    if(data.status == "0") {
                        $('#remember_me').addClass('d-none');
                        $('#onetime_password').removeClass('d-none');
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
                            title: 'armanmask.ir',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        window.location.replace('{{route('home')}}');
                    }
                }
            })
        });
    </script>
    <script>
        $(document).on('click','#give_code', function (){
            $.ajax({
                'url' : '{{route('one_time_code')}}',
                'type' : 'POST',
                'data' : {'mobile' : $('#mobile').val() , 'send' : 1},
                success : function (data){
                    console.log(data)
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
                            title: 'armanmask.ir',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(function (data) {
                            $('#mobile').addClass('d-none');
                            $('#code').addClass('d-none');
                            {{--setTimeout(function(){--}}
                            {{--    window.location.replace('{{route('home')}}');--}}
                            {{--},1000);--}}
                        });
                    }
                }
            });
        });
    </script>
@endsection

