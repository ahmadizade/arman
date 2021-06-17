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
                    {{--Import Phone Number Cart--}}
                    <div id="inputMobile" class="auth-wrapper form-ui pt-4">
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">تماس با ما</h2>
                        </div>
                        <div class="message-light">
                            فرم زیر را تکمیل کنید و در اسرع زمان همکاران پشتیبانی با شما تماس می گیرند.
                        </div>
                        <form id="contact_us" action="#">
                            <div class="form-row-title">
                                <h3>شماره موبایل</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input id="mobile" name="mobile" type="text" class="input-ui pr-2"
                                       placeholder="شماره موبایل خود را وارد نمایید">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>

                             <div class="form-row-title">
                                <h3>نام و نام خانوادگی</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input id="name" name="name" type="text" class="input-ui pr-2"
                                       placeholder="مثلا : دنیا فلاحی">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>

                             <div class="form-row-title">
                                <h3>متن پیام شما</h3>
                            </div>
                            <div class="form-row with-icon">
                                <textarea id="desc" name="desc" rows="4" class="input-ui pr-2">متن پیام خود را اینجا بنویسید</textarea>
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>


                            <div class="form-row mt-3">
                                <button id="contact_btn" class="btn-primary-cm btn-with-icon mx-auto w-100">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ارسال پیام
                                </button>
                            </div>
                        </form>
                        <div class="form-footer mt-3">
                            <div>
                                <span class="font-weight-bold">درباره ما بدون</span>
                                <a href="{{route('about_Us')}}" class="mr-3 mt-2">درباره ما</a>
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
                        <li><a href="{{route('home')}}">درباره سی و سه</a></li>
                        <li><a href="{{route('home')}}">فرصت های شغلی</a></li>
                        <li><a href="{{route('home')}}">تماس با ما</a></li>
                        <li><a href="{{route('home')}}">همکاری با سازمان ها</a></li>
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
{{--    <script src="./assets/js/vendor/isotope.pkgd.min.js"></script>--}}
<script src="/js/vendor/jquery.horizontalmenu.js"></script>
<script src="/js/vendor/nouislider.min.js"></script>
<script src="/js/vendor/wNumb.js"></script>
<script src="/js/vendor/ResizeSensor.min.js"></script>
<script src="/js/vendor/theia-sticky-sidebar.min.js"></script>
<link rel="stylesheet" href="/css/vendor/sweetalert2.all.css">
<!-- Main JS File -->
<script src="/js/main.js"></script>
<script>
    $(document).on('click','#contact_btn', function (e){
        e.preventDefault();
        $.ajax({
            'url' : '{{route('contact_action')}}',
            'type' : 'POST',
            'data' : $('#contact_us').serialize(),
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
