<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <title>لینک دانلود | armanmask</title>
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
{{--Download Links--}}
                        <div id="inputMobile" class="auth-wrapper form-ui pt-4">
                            <div class="section-title title-wide mb-1 no-after-title-wide">
                                <h2 class="font-weight-bold">لینک دانلود</h2>
                            </div>
                            <div class="message-light">
                                توجه داشته باشید که فقط <span class="text-danger">3</span> باز مجاز به دانلود این محصول هستید.
                            </div>
                            @if(isset($product_links , $order) && isset($product_links[0]))
                                @foreach($product_links as $item)
                                <div class="message-light">
                                    <div class="form-row mt-3">
                                        <span class="font-weight-bold">نام محصول : </span>
                                        <span class="mr-1">{{$item->product_name ?? "نا مشخص"}}</span>
                                        <button order-id="{{$order->id}}" data-id="{{$item->id}}" class="btn-primary-cm download-btn btn-with-icon mx-auto w-100 mt-2">
                                            <i class="mdi mdi-account-circle-outline"></i>
                                            دریافت فایل
                                        </button>
                                    </div>
                                </div>

                            @endforeach
                            @endif
                            <div class="form-footer mt-3">
                                <div>
                                    <span class="font-weight-bold">بازگشت به خانه</span>
                                    <a href="{{route('orders')}}" class="mr-3 mt-2">صفحه اصلی</a>
                                </div>
                            </div>
                        </div>
{{--Download Links--}}
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
                            <li><a href="{{route('about_Us')}}">درباره آرمان</a></li>
                            <li><a href="{{route('home')}}">فرصت های شغلی</a></li>
                            <li><a href="{{route('home')}}">تماس با ما</a></li>
                            <li><a href="{{route('home')}}">همکاری با سازمان ها</a></li>
                        </ul>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="footer-light-text">
                            استفاده از مطالب فروشگاه اینترنتی آرمان فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع
                            است. کلیه حقوق این سایت متعلق به (فروشگاه آنلاین آرمان) می‌باشد.
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="copy-right-mini-footer">
                            Copyright © 2019 armanmask
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
        $(document).ready(function(){
            $('body').on('click','.download-btn',function (e){
                e.preventDefault();
                $order_id = $(this).attr('order-id');
                $product_id = $(this).attr('data-id');
                $.ajax({
                    url : "{{route('purchase_download')}}",
                    type : "post",
                    data : {"order_id" : $order_id, "product_id" : $product_id},
                    success : function (data) {
                        console.log(data);
                        if (data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                title : "Support-Team",
                                text: data.desc,
                                footer:'خطا در بارگزاری فایل',
                                showConfirmButton: false,
                                timer: 5000
                            });
                        }
                        if (data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                title: 'armanmask',
                                text: data.desc,
                                footer:"با تشکر از همراهی شما",
                                showConfirmButton: false,
                                timer: 9000
                            });
                        }
                    }
                })
            });

        });
    </script>
</body>

</html>
