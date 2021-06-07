<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <title>CioCe.ir | تغییر رمز عبور</title>
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
                        @include('partials.condition')
                        <div class="logo-area text-center mb-3">
                            <a href="#"><img src="/img/logo.png" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="auth-wrapper form-ui pt-4">
                            <div class="section-title title-wide mb-1 no-after-title-wide">
                                <h2 class="font-weight-bold">تغییر رمز عبور</h2>
                            </div>
                            <form action="{{route('change_password_action')}}" method="POST">
                                <div class="form-row-title">
                                    <h3>رمز عبور فعلی</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input name="old_password" type="password" class="input-ui pr-2"
                                        placeholder="رمز عبور فعلی را وارد نمایید">
                                    <i class="mdi mdi-lock-open-variant-outline"></i>
                                </div>
                                <div class="form-row-title">
                                    <h3>رمز عبور جدید</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input name="password" type="password" class="input-ui pr-2"
                                        placeholder="رمز عبور جدید را وارد نمایید">
                                    <i class="mdi mdi-lock-reset"></i>
                                </div>
                                <div class="form-row-title">
                                    <h3>تکرار رمز عبور جدید</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input name="confirm_password" type="password" class="input-ui pr-2"
                                        placeholder="رمز عبور را مجدد وارد نمایید">
                                    <i class="mdi mdi-lock-reset"></i>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">
                                            مرا به خاطر بسپار
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <button type="submit" class="btn-primary-cm btn-with-icon mx-auto w-100">
                                        <i class="mdi mdi-lock-reset"></i>
                                        تغییر رمز عبور
                                    </button>
                                </div>
                            </form>
                            <div class="form-footer mt-3">
                                <div>
                                    <span class="font-weight-bold">کاربر جدید هستید؟</span>
                                    <a href="{{route('register')}}" class="mr-3 mt-2">ثبت نام در CioCe</a>
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
                            <li><a href="#">درباره سی و سه</a></li>
                            <li><a href="#">فرصت های شغلی</a></li>
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">همکاری با سازمان ها</a></li>
                        </ul>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="footer-light-text">
                            استفاده از مطالب فروشگاه اینترنتی سی و سه فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع
                            است. کلیه حقوق این سایت متعلق به (فروشگاه آنلاین سی و سه) می‌باشد.
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="copy-right-mini-footer">
                            Copyright © 2019 CioCe
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
    <script src="/js/vendor/jquery.horizontalmenu.js"></script>
    <script src="/js/vendor/nouislider.min.js"></script>
    <script src="/js/vendor/wNumb.js"></script>
    <script src="/js/vendor/ResizeSensor.min.js"></script>
    <script src="/js/vendor/theia-sticky-sidebar.min.js"></script>
    <!-- Main JS File -->
    <script src="/js/main.js"></script>
</body>

</html>
