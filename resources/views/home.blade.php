@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
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
<!-- Free Website -->
    @if(isset($lastProduct))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 my-3">
                    <h2 class="title-default green"><span>وبسایت های رایگان</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                        <div class="owl-carousel owl-theme owl">
                            @foreach($lastProduct as $product)
                                <a href="{{ route("shop_product_single",["id" => $product->id]) }}">
                                    <div class="slider-desc text-center overflow-hidden">
                                        <div class="item">
                                            <div style="min-height: 260px;" class="row justify-content-center align-items-center">
                                                @if(is_null($product->image))
                                                    <img src="/images/no-image2.png" alt="BTI" class="img-fluid">
                                                @else
                                                    <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI" class="img-fluid">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="price-box rtl">
                                            <p class="mt-3 font-13 nowrap">{{ $product->product_name }}</p>
                                            @if($product->discount > 20)
                                                <div>
                                                    <del class="font-14 mt-1 nowrap text-secondary">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                    <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="font-12">ریال</span></p>
                                                </div>
                                            @else
                                                <div class="mt-1">
                                                    <span class="font-14 mt-1 nowrap text-danger">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                                    <p class="text-danger font-13 mt-2 nowrap"><span class="fas fa-gift fa-lg"></span>  خرید با شارژ هدیه</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

<!-- Store Website -->
    @if(isset($lastProduct))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 my-3">
                    <h2 class="title-default green"><span>وبسایت های فروشگاهی</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                        <div class="owl-carousel owl-theme owl">
                            @foreach($lastProduct as $product)
                                <a href="{{ route("shop_product_single",["id" => $product->id]) }}">
                                    <div class="slider-desc text-center overflow-hidden">
                                        <div class="item">
                                            <div style="min-height: 260px;" class="row justify-content-center align-items-center">
                                                @if(is_null($product->image))
                                                    <img src="/images/no-image2.png" alt="BTI" class="img-fluid">
                                                @else
                                                    <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI" class="img-fluid">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="price-box rtl">
                                            <p class="mt-3 font-13 nowrap">{{ $product->product_name }}</p>
                                            @if($product->discount > 20)
                                                <div>
                                                    <del class="font-14 mt-1 nowrap text-secondary">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                    <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="font-12">ریال</span></p>
                                                </div>
                                            @else
                                                <div class="mt-1">
                                                    <span class="font-14 mt-1 nowrap text-danger">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                                    <p class="text-danger font-13 mt-2 nowrap"><span class="fas fa-gift fa-lg"></span>  خرید با شارژ هدیه</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

<!-- Wordpress Website -->
    @if(isset($lastProduct))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 my-3">
                    <h2 class="title-default green"><span>وب سایت های رایگان</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                        <div class="owl-carousel owl-theme owl">
                            @foreach($lastProduct as $product)
                                <a href="{{ route("shop_product_single",["id" => $product->id]) }}">
                                    <div class="slider-desc text-center overflow-hidden">
                                        <div class="item">
                                            <div style="min-height: 260px;" class="row justify-content-center align-items-center">
                                                @if(is_null($product->image))
                                                    <img src="/images/no-image2.png" alt="BTI" class="img-fluid">
                                                @else
                                                    <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI" class="img-fluid">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="price-box rtl">
                                            <p class="mt-3 font-13 nowrap">{{ $product->product_name }}</p>
                                            @if($product->discount > 20)
                                                <div>
                                                    <del class="font-14 mt-1 nowrap text-secondary">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                    <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="font-12">ریال</span></p>
                                                </div>
                                            @else
                                                <div class="mt-1">
                                                    <span class="font-14 mt-1 nowrap text-danger">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                                    <p class="text-danger font-13 mt-2 nowrap"><span class="fas fa-gift fa-lg"></span>  خرید با شارژ هدیه</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Wordpress Plugin -->
    @if(isset($lastProduct))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 my-3">
                    <h2 class="title-default green"><span>وب سایت های رایگان</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                        <div class="owl-carousel owl-theme owl">
                            @foreach($lastProduct as $product)
                                <a href="{{ route("shop_product_single",["id" => $product->id]) }}">
                                    <div class="slider-desc text-center overflow-hidden">
                                        <div class="item">
                                            <div style="min-height: 260px;" class="row justify-content-center align-items-center">
                                                @if(is_null($product->image))
                                                    <img src="/images/no-image2.png" alt="BTI" class="img-fluid">
                                                @else
                                                    <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI" class="img-fluid">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="price-box rtl">
                                            <p class="mt-3 font-13 nowrap">{{ $product->product_name }}</p>
                                            @if($product->discount > 20)
                                                <div>
                                                    <del class="font-14 mt-1 nowrap text-secondary">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                    <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="font-12">ریال</span></p>
                                                </div>
                                            @else
                                                <div class="mt-1">
                                                    <span class="font-14 mt-1 nowrap text-danger">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                                    <p class="text-danger font-13 mt-2 nowrap"><span class="fas fa-gift fa-lg"></span>  خرید با شارژ هدیه</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

<!-- Web Picture -->
    @if(isset($lastProduct))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 my-3">
                    <h2 class="title-default green"><span>وب سایت های رایگان</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                        <div class="owl-carousel owl-theme owl">
                            @foreach($lastProduct as $product)
                                <a href="{{ route("shop_product_single",["id" => $product->id]) }}">
                                    <div class="slider-desc text-center overflow-hidden">
                                        <div class="item">
                                            <div style="min-height: 260px;" class="row justify-content-center align-items-center">
                                                @if(is_null($product->image))
                                                    <img src="/images/no-image2.png" alt="BTI" class="img-fluid">
                                                @else
                                                    <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI" class="img-fluid">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="price-box rtl">
                                            <p class="mt-3 font-13 nowrap">{{ $product->product_name }}</p>
                                            @if($product->discount > 20)
                                                <div>
                                                    <del class="font-14 mt-1 nowrap text-secondary">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                    <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="font-12">ریال</span></p>
                                                </div>
                                            @else
                                                <div class="mt-1">
                                                    <span class="font-14 mt-1 nowrap text-danger">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                                    <p class="text-danger font-13 mt-2 nowrap"><span class="fas fa-gift fa-lg"></span>  خرید با شارژ هدیه</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
                    margin: 10
                },
                1000: {
                    items: 5,
                    nav: false,
                    margin: 10
                }
            }
        });
    </script>
    <script src="/js/app_jquery.js"></script>
@endsection
