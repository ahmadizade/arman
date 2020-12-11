@extends("layouts.master")

@section("title")
    <title>صفحه اصلی | CioCe.ir</title>
@endsection

@section("content")

    <!-- Carousel -->
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div id="carouselHome" class="carousel slide" data-ride="carousel">--}}
{{--                    <ol class="carousel-indicators">--}}
{{--                        <li data-target="#carouselHome" data-slide-to="0" class="active"></li>--}}
{{--                        <li data-target="#carouselHome" data-slide-to="1"></li>--}}
{{--                        <li data-target="#carouselHome" data-slide-to="2"></li>--}}
{{--                    </ol>--}}
{{--                    <div class="carousel-inner">--}}
{{--                        <div class="carousel-item active">--}}
{{--                            <img class="d-block w-100" src="images/slider/1.png" alt="First slide">--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img class="d-block w-100" src="images/slider/2.png" alt="Second slide">--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img class="d-block w-100" src="images/slider/3.png" alt="Third slide">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">--}}
{{--                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                        <span class="sr-only">Previous</span>--}}
{{--                    </a>--}}
{{--                    <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">--}}
{{--                        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                        <span class="sr-only">Next</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Counter -->

    {{--Head Image--}}
    <img class="img-fluid" src="{{url('/images/bg/ankara-web-tasarim-slayt-3.png')}}">
{{--Application Picture--}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-6 col-lg-4 text-center mt-3">
                <img src="images/home/investment.png" alt="تالار سرمایه گذاری"
                     class="img-fluid mb-4">
                <h3 class="card-title font-weight-bolder">سرمایه گذاری و مشارکت در پروژه</h3>
                <p>حتی می تونی مشارکت علمی داشته باشی</p>
            </div>
            <div class="col-6 col-lg-4 text-center mt-3">
                <img id="add-store-btn" src="images/home/presale.png" alt="پیش فروش"
                     class="img-fluid pointer-event mb-4">
                <h3 class="card-title font-weight-bolder">طراحی وب سایت</h3>
                <p>طراحی و ساخت وب سایت با جدیدترین روش های روز دنیا</p>
            </div>
            <div class="col-6 col-lg-4 text-center mt-3">
                <img id="add-store-btn" src="images/home/webdesign.png" alt="طراحی وب سایت"
                     class="img-fluid pointer-event mb-4">
                <h3 class="card-title font-weight-bolder">میز کار</h3>
                <p>برنامه نویسان می توانند جهت همکاری ثبت نام کنند</p>
            </div>
            <!--< mid shape>-->
            <div class="col-12">
                <div class="mid-shape mt-4">
                    <div class="mid-shapemask"></div>
                    <span><i><a href="index.html"><img class="logo-shape" src="images/logo/logo50px.png" alt=""></a></i></span>
                </div>
            </div>
            <!--< mid shape>-->
        </div>
    </div>
<!-- Application -->
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mt-3">
                <img src="images/home/stand-2.svg" alt="CIOCE" class="img-fluid ml-5">
                <p>اینجا کلی وب سایت و پلاگین وردپرس و پنل های رایگان و سرویسای توپ مجانی هست، همشونم رایگان، حالا اینا که چیزی نیست!! میتونی کنار ما کلی پول در بیاری</p>
                <p>می تونی وب سایت رایگان از ما بگیری و واست رایگان راه اندازیش کنیم، هیچی پولم ازت نمی گیریم که هیچ، تازه پشتیبانیتم می کنیم</p>
            </div>
            <div class="col-md-4 text-center mt-3">
                <img src="images/home/mobile2.png" alt="Bazar Tahator Iranian" class="img-fluid mb-4">
            </div>
            <div class="col-md-4 text-center mt-3">
                <img src="images/home/walk.svg" alt="CIOCE" class="img-fluid">
                <img src="images/home/sit.svg" alt="CIOCE" class="img-fluid ml-5 mr-5">
                <p>می تونی سایت بسازی ، پلاگین بسازی، عکس درست کنی و کلی چیزای دیگه ، همشم بزاری رایگان اینجا بفروشی</p>
                <p>میتونی پنل کیو آر کد رایگان بگیری ازمون و کلی پنل رایگان دیگه، تازه می تونی اینجا سرمایه گذار واسه وب سایتت پیدا کنی</p>
                <p>حتی می تونی روی وب سایت های توی سایت سرمایه گذاری کنی و تو سود اونا شریک بشی</p>
            </div>
            <!--< mid shape>-->
            <div class="col-12 mt-4">
                <div class="mid-shape mt-4">
                    <div class="mid-shapemask"></div>
                    <span><i><a href="index.html"><img class="logo-shape" src="images/logo/logo50px.png" alt=""></a></i></span>
                </div>
            </div>
            <!--< mid shape>-->
        </div>
    </div>
<!-- Free Website -->

<!-- free Website -->
@include('/product.free_products')
@include('/product.popular_products')
@include('/product.cioce_products')

    <!-- Banner Fixed Background 2-->
    <div class="container-fluid">
        <div class="row flex-column justify-content-center align-items-center py-5" style="background: fixed center center url('/images/bg/s1.jpg'); height: 250px;background-repeat: no-repeat;background-size: cover;">
{{--            <span class="font-30 text-center font-weight-bold py-3 px-5 rounded-sm mt-3 ">--}}
{{--                <img src="{{ asset('images/logo/logo-250.png') }}" alt="logo" class="img-fluid d-block d-md-inline mx-a">--}}
{{--                <span class="d-block d-md-inline text-center">CioCe</span>--}}
{{--                <div class="font-20 text-primary font-weight-bold bg-white py-1 px-5 rounded-sm mt-2 shadow-sm">CioCe Web Pack For Everyone</div>--}}
{{--            </span>--}}
        </div>
    </div>
    <!-- Sections -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="section bg-red">
                    <div class="subject">پذیرندگان ثمین تخفیف</div>
                    <i class="fas fa-people-carry icon"></i>
                    <div class="desc">از کجا خرید کنم؟</div>
                    <a href="#" class="button">ادامه مطلب&nbsp;<i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="section bg-orange">
                    <div class="subject">اعطای نمایندگی</div>
                    <i class="fas fa-certificate icon"></i>
                    <div class="desc">چگونه نماینده شوم؟</div>
                    <a href="#" class="button">ادامه مطلب&nbsp;<i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="section bg-purple">
                    <div class="subject">سوالات متداول</div>
                    <i class="far fa-question-circle icon"></i>
                    <div class="desc">پاسخ به سوالات شما</div>
                    <a href="#" class="button">ادامه مطلب&nbsp;<i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="section bg-blue">
                    <div class="subject">گواهی نامه ها</div>
                    <i class="fas fa-mail-bulk icon"></i>
                    <div class="desc">مجوزها و گواهی نامه</div>
                    <a href="#" class="button">ادامه مطلب&nbsp;<i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="section bg-blue">
                    <div class="subject">ثمین آموزش</div>
                    <i class="fa fa-graduation-cap icon"></i>
                    <div class="desc">مشارکت در ثمین تخفیف و سررسید</div>
                    <a href="#" class="button">ادامه مطلب&nbsp;<i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="section bg-purple">
                    <div class="subject">قوانین و مقررات</div>
                    <i class="fa fa-balance-scale icon"></i>
                    <div class="desc">بدانید و آگاه باشید</div>
                    <a href="#" class="button">ادامه مطلب&nbsp;<i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="section bg-orange">
                    <div class="subject">کاربری سایت</div>
                    <i class="fas fa-sitemap icon"></i>
                    <div class="desc">راهنمای استفاده از سایت</div>
                    <a href="#" class="button">ادامه مطلب&nbsp;<i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="section bg-red">
                    <div class="subject">تماس با ما</div>
                    <i class="fas fa-tty icon"></i>
                    <div class="desc">با ما در ارتباط باشید</div>
                    <a href="#" class="button">ادامه مطلب&nbsp;<i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script>
        $(".owl").owlCarousel({
            center: true,
            itemsMobile: false,
            lazyLoad: true,
            responsiveClass: true,
            loop: true,
            dots: false,
            stopOnHover: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                    margin: 10
                },
                600: {
                    items: 3,
                    nav: false,
                    margin: 20
                },
                1000: {
                    items: 5,
                    nav: false,
                    margin: 30
                }
            }
        });
    </script>
    <script src="/js/app_jquery.js"></script>
@endsection
