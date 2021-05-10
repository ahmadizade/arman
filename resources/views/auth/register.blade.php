<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <title>ثبت نام | Cioce</title>
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
</head>

<body>

    <div class="wrapper">
        <!-- Start main-content -->
        <main class="main-content dt-sl mt-4 mb-3">
            <div class="container main-container">

                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                        <div class="logo-area text-center mb-3">
                            <a href="{{route('home')}}"><img src="/img/logo.png" class="img-fluid" alt="logo"></a>
                        </div>
                            <div id="inputMobile" class="auth-wrapper form-ui pt-4">
                            <div class="section-title title-wide mb-1 no-after-title-wide">
                                <h2 class="font-weight-bold">ثبت نام</h2>
                            </div>
                            <div class="message-light">
                                اگر قبلا ثبت‌نام کرده‌اید، نیاز به ثبت‌نام مجدد با شماره همراه ندارید
                            </div>
                            <form id="registerForm" action="#">
                                <div class="form-row-title">
                                    <h3>شماره موبایل</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input id="mobile" name="mobile" type="text" class="input-ui pr-2"
                                        placeholder="شماره موبایل خود را وارد نمایید">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </div>
{{--                                <div class="form-row-title">--}}
{{--                                    <h3>رمز عبور</h3>--}}
{{--                                </div>--}}
{{--                                <div class="form-row with-icon">--}}
{{--                                    <input type="password" class="input-ui pr-2"--}}
{{--                                        placeholder="رمز عبور خود را وارد نمایید">--}}
{{--                                    <i class="mdi mdi-lock-open-variant-outline"></i>--}}
{{--                                </div>--}}
                                <div class="form-row mt-2">
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="customCheck3" >
                                        <label class="custom-control-label text-justify" for="customCheck3">
                                            <a href="{{route('home')}}">حریم خصوصی</a> و <a href="{{route('home')}}">شرایط و قوانین</a> استفاده از سرویس
                                            های سایت سیوسه را مطالعه نموده و با کلیه موارد آن موافقم.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <button id="register" class="btn-primary-cm btn-with-icon mx-auto w-100">
                                        <i class="mdi mdi-account-circle-outline"></i>
                                        ثبت نام در سیوسه
                                    </button>
                                </div>
                            </form>
                            <div class="form-footer mt-3">
                                <div>
                                    <span class="font-weight-bold">قبلا ثبت نام کرده اید؟</span>
                                    <a href="{{route('login')}}" class="mr-3 mt-2">وارد شوید</a>
                                </div>
                            </div>
                        </div>

                            <div id="verifiedCode" class="auth-wrapper form-ui pt-4 d-none">
                            <div class="section-title title-wide mb-1 no-after-title-wide">
                                <h2 class="font-weight-bold">تایید شماره</h2>
                            </div>
                            <div class="message-light">
                                برای شماره همراه <span id="mobileNumber"></span> کد تایید ارسال گردید
                                <a href="#" class="btn-link-border">
                                    ویرایش شماره
                                </a>
                            </div>
                            <form action="#">
                                <div class="form-row-title">
                                    <h3>کد تایید را وارد کنید</h3>
                                </div>
                                <div class="form-row">
                                    <div class="numbers-verify">
                                        <div class="lines-number-input">
                                            <input type="text" class="line-number" maxlength="1" autofocus="">
                                            <input type="text" class="line-number" maxlength="1">
                                            <input type="text" class="line-number" maxlength="1">
                                            <input type="text" class="line-number" maxlength="1">
                                            <input type="text" class="line-number" maxlength="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="d-flex align-items-center">
                                        <span class="text-primary btn-link-border ml-1">دریافت مجدد کد تایید</span>
                                        <span>(</span>
                                        <p id="countdown-verify-end"></p>
                                        <span>)</span>
                                    </div>
                                </div>
                            </form>
                            <div class="form-footer mt-3">
                                <div>
                                    <span class="font-weight-bold">کاربر جدید هستید؟</span>
                                    <a href="#" class="mr-3 mt-2">ثبت نام در دیدیکالا</a>
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
                            <li><a href="{{route('home')}}">درباره سیوسه</a></li>
                            <li><a href="{{route('home')}}">فرصت های شغلی</a></li>
                            <li><a href="{{route('home')}}">تماس با ما</a></li>
                            <li><a href="{{route('home')}}">همکاری با سازمان ها</a></li>
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
                            Copyright © 2019 Cioce
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
    <script src="./assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="/js/vendor/jquery.horizontalmenu.js"></script>
    <script src="/js/vendor/nouislider.min.js"></script>
    <script src="/js/vendor/wNumb.js"></script>
    <script src="/js/vendor/ResizeSensor.min.js"></script>
    <script src="/js/vendor/theia-sticky-sidebar.min.js"></script>
    <link rel="stylesheet" href="/css/vendor/sweetalert2.all.css">
    <!-- Main JS File -->
    <script src="/js/main.js"></script>
    <script>
        $('#register').click(function (e) {
            e.preventDefault();
            $.ajax({
                'url' : '{{route('register_action')}}',
                'type' : "POST",
                'data' : $('#registerForm').serialize(),
                success : function (data) {
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
    </script>

</body>

</html>
