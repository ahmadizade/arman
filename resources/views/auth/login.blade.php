<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <title>ورود | Cioce</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/vendor/jquery.horizontalmenu.css">
    <link rel="stylesheet" href="/css/vendor/nouislider.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="/css/vendor/materialdesignicons.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/colors/default.css" id="colorswitch">
    <link rel="stylesheet" href="/css/vendor/sweetalert2.all.css">

</head>

<body>
    <div class="wrapper">
        <!-- Start main-content -->
        <main class="main-content dt-sl mt-4 mb-3">
            <div class="container main-container">

                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                        <div class="logo-area text-center mb-3">
                            <a href="#"><img src="/img/logo.png" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="auth-wrapper form-ui pt-4">
                            <div class="section-title title-wide mb-1 no-after-title-wide">
                                <h2 class="font-weight-bold">ورود</h2>
                            </div>
                            <form id="loginForm" action="#">
                                <div class="form-row-title">
                                    <h3>شماره موبایل</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input id="mobile" name="mobile" type="text" class="input-ui pr-2"
                                        placeholder="شماره موبایل خود را وارد نمایید">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </div>
                                <div id="code_box" class="form-row with-icon d-none">
                                    <input id="one_time_code_action" name="one_time_code" type="text" class="input-ui pr-2"
                                        placeholder="کد ارسال شده به همراه">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </div>
                                <div class="form-row-title">
                                    <h3>رمز عبور</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input id="code" name="code" type="password" class="input-ui pr-2"
                                        placeholder="رمز عبور خود را وارد نمایید">
                                    <i class="mdi mdi-lock-open-variant-outline"></i>
                                </div>
                                <div class="form-row mt-2">
                                    <div id="remember_me" class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">
                                            مرا به خاطر بسپار
                                        </label>
                                    </div>

                                    <div id="onetime_password" class="custom-control d-none custom-checkbox float-right mt-2">
                                        <a href="javascript:void(0)" id="give_code">
                                            ارسال رمز یکبار مصرف
                                        </a>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <button id="login" class="btn-primary-cm btn-with-icon mx-auto w-100">
                                        <i class="mdi mdi-login-variant"></i>
                                        ورود به CioCe
                                    </button>
                                </div>
                            </form>
                            <div class="form-footer mt-3">
                                <div>
                                    <a href="{{route('change_password')}}" class="mr-3 mt-2 text-black-50">فراموشی رمزعبور</a>
                                    <a href="#" class="mr-3 mt-2">ثبت نام در CioCe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <!-- End main-content -->

        <!-- Start mini-footer -->
        <footer class="mini-footer dt-sl">
            <div class="container main-container">
                <div class="row">
                    <div class="col-12">
                        <ul class="mini-footer-menu">
                            <li><a href="#">درباره Cioce</a></li>
                            <li><a href="#">فرصت های شغلی</a></li>
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">همکاری با سازمان ها</a></li>
                        </ul>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="footer-light-text">
                            استفاده از مطالب فروشگاه اینترنتی سیوسه فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع
                            است. کلیه حقوق این سایت متعلق به (فروشگاه آنلاین سیوسه) می‌باشد.
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="copy-right-mini-footer">
                            Copyright © 2019 CioCe.ir
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End mini-footer -->
    </div>
    <!-- Core JS Files -->
    <script src="/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="/js/vendor/popper.min.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <!-- Plugins -->
    <script src="/js/vendor/owl.carousel.min.js"></script>
    <script src="/js/vendor/sweetalert2.all.min.js"></script>
    <script src="/js/vendor/jquery.horizontalmenu.js"></script>
    <script src="/js/vendor/nouislider.min.js"></script>
    <script src="/js/vendor/wNumb.js"></script>
    <script src="/js/vendor/ResizeSensor.min.js"></script>
    <script src="/js/vendor/theia-sticky-sidebar.min.js"></script>
    <!-- Main JS File -->
    <script src="/js/main.js"></script>
    <script>
        $('#login').click(function (e) {
            e.preventDefault();
            $.ajax({
                'url' : '{{route('login_action')}}',
                'type' : "POST",
                'data' : $('#loginForm').serialize(),
                success : function (data) {
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
                            title: 'CioCe.ir',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(function () {
                            setTimeout(function(){
                                window.location.replace('{{route('home')}}');
                            },1000);
                        });
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
                           title: 'CioCe.ir',
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
</body>

</html>
