@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")

    <!-- Carousel -->
        <div class="row">
            <div class="col-12">
                <div id="carouselHome" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselHome" data-slide-to="1"></li>
                        <li data-target="#carouselHome" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/home/no-money.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/home/bazarti.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/home/categories.jpg" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    <!-- Counter -->


    <div class="site-blocks-cover w-100" style="background-image:url({{url('/images/bg/welcome-bg.png')}})">

    </div>

    <!-- Gif -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-6 col-lg-3 text-center mt-3">
                <img src="images/gif/tienda.gif" alt="Bazar Tahator Iranian"
                     class="img-fluid mb-4" style="width: 100px">
                <h3 class="card-title">ثبت فروشگاه</h3>
                <p>فروشگاهت و ثبت کن، درآمد کسب کن</p>
            </div>
            <div class="col-6 col-lg-3 text-center mt-3">
                <img id="add-store-btn" src="images/gif/gold.gif" alt="Bazar Tahator Iranian"
                     class="img-fluid pointer-event mb-4" style="width: 100px">
                <h3 class="card-title">طلایی شو</h3>
                <p>طلایی شو، شارژ بیشتر بگیر</p>
            </div>
            <div class="col-6 col-lg-3 text-center mt-3">
                <img id="add-store-btn" src="images/gif/football3.gif" alt="Bazar Tahator Iranian"
                     class="img-fluid pointer-event mb-4" style="width: 100px">
                <h3 class="card-title">هواداران</h3>
                <p>از تیم محبوبت حمایت کن</p>
            </div>
            <div class="col-6 col-lg-3 text-center mt-3">
                <img id="add-store-btn" src="images/gif/support-icon.gif" alt="Bazar Tahator Iranian"
                     class="img-fluid pointer-event mb-4" style="width: 90px">
                <h3 class="card-title">پشتیبانی 24 ساعته</h3>
                <p>7 روز هفته 24 ساعته</p>
            </div>
            <!--< mid shape>-->
            <div class="col-12">
                <div class="mid-shape mt-4">
                    <div class="mid-shapemask"></div>
                    <span><i><a href="index.html"><img class="logo-shape" src="images/logo/logo_50_22.png" alt=""></a></i></span>
                </div>
            </div>
            <!--< mid shape>-->
        </div>
    </div>

    <!-- Application -->
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mt-3">
                <h3 class="card-title">BAZARTI APPLICATION</h3>
                <p>شما میتوانید اپ بازارتی را از سایت بازار یا بازارتی دانلود کنید</p>
                <p>اگر موقع نصب مشکلی داشتی با پشتیبانی دوازده هفت بیست و چهار ما تماس بگیر</p>
                <a class="fr__btn text-white">پشتیبانی آنلاین</a>
            </div>
            <div class="col-md-4 text-center mt-3">
                <img src="images/home/mobile.png" alt="Bazar Tahator Iranian" class="img-fluid mb-4">
            </div>
            <div class="col-md-4 text-center mt-3">
                <h3 class="card-title">CMS APPLICATION</h3>
                <p>اپلیکیشن کارت به کارت بازارتی امکان پرداخت اعتبار و خرید از سایت را به شما می دهد</p>
                <p>تازه می تونی تو قرعه کشی ما هم از این طریق ثبت نام کنید</p>
                <a class="fr__btn text-white">کاربر طلایی</a>
            </div>
            <!--< mid shape>-->
            <div class="col-12 mt-4">
                <div class="mid-shape mt-4">
                    <div class="mid-shapemask"></div>
                    <span><i><a href="index.html"><img class="logo-shape" src="images/logo/logo_50_22.png" alt=""></a></i></span>
                </div>
            </div>
            <!--< mid shape>-->
        </div>
    </div>

    <!-- Banner -->
    <div class="container mt-3">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-12 text-center mt-4">
                <img src="/images/home/new.jpg" alt="Bazar Tahator Iranian" class="img-fluid mb-4">
            </div>
            <!--< mid shape>-->
            <div class="col-12">
                <div class="mid-shape mt-4">
                    <div class="mid-shapemask"></div>
                    <span><i><a href="index.html"><img class="logo-shape" src="images/logo/logo_50_22.png" alt=""></a></i></span>
                </div>
            </div>
            <!--< mid shape>-->
        </div>
    </div>

    <!-- Popular Shop -->
    @if(isset($popularShop))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 my-3">
                    <h2 class="title-default"><span>فروشگاه های برگزیده</span></h2>
                </div>
            </div>
               <div class="row">
                    <div class="col-12">
                        <div class="owl-container">
                            <div class="owl-carousel owl-theme owl">
                            @foreach($popularShop as $shop)
                                    <div class="card">
                                        <div class="card-body">
                                            <div style="min-height: 260px;" class="row justify-content-center align-items-center">
                                                @if(is_null($shop->logo))
                                                    <img class="card-img-top img-fluid" src="/images/no-image2.png" alt="BTI">
                                                @else
                                                    <img class="card-img-top img-fluid" src="{{Storage::disk('logo')->url($shop['logo'])}}" alt="{{ $shop->shop }}">
                                                @endif
                                            </div>
                                            <h5 class="card-title text-center" style="color: {{ $shop->color }}">{{ $shop->shop }}</h5>
                                            <p class="card-text text-justify" style="direction: rtl; height: 130px; overflow: hidden;">{!! \Illuminate\Support\Str::limit(strip_tags($shop->desc), 150, ' (...)') !!}</p>
                                            <div class="row justify-content-center">
                                                <a href="{{ route('single_shop',['shop' => $shop->shop_slug , 'branch' => $shop->branch_slug]) }}" class="btn btn-primary" style="background-color: {{ $shop->color }}; border-color: {{ $shop->color }}">مشاهده فروشگاه</a>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Banner -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <img src="/images/home/mid-1.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <!-- Random Shop -->
    @if(isset($randomShop))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 my-3">
                    <h2 class="title-default red"><span>فروشگاه های تصادفی</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                        <div class="owl-carousel owl-theme owl">
                            @foreach($randomShop as $shop)
                                <div class="card">
                                    <div class="card-body">
                                        <div style="min-height: 260px;" class="row justify-content-center align-items-center">
                                            @if(is_null($shop->logo))
                                                <img class="card-img-top" src="/images/no-image2.png" alt="BTI">
                                            @else
                                                <img class="card-img-top" src="{{Storage::disk('logo')->url($shop['logo'])}}" alt="{{ $shop->shop }}">
                                            @endif
                                        </div>
                                        <h5 class="card-title text-center" style="color: {{ $shop->color }}">{{ $shop->shop }}</h5>
                                        <p class="card-text text-justify" style="direction: rtl; height: 130px; overflow: hidden;">{!! \Illuminate\Support\Str::limit(strip_tags($shop->desc), 150, ' (...)') !!}</p>
                                        <div class="row justify-content-center">
                                            <a href="{{ route('single_shop',['shop' => $shop->shop_slug , 'branch' => $shop->branch_slug]) }}" class="btn btn-primary" style="background-color: {{ $shop->color }}; border-color: {{ $shop->color }}">مشاهده فروشگاه</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Banner -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <img src="/images/home/mid-2.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <!-- Random Products -->
    @if(isset($lastProduct))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 my-3">
                    <h2 class="title-default green"><span>آخرین کالا های ثبت شده</span></h2>
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

    <!-- Banner Fixed Background -->
    <div class="container-fluid">
        <div class="row flex-column justify-content-center align-items-center h-100 py-5" style="background: fixed center center url('/images/home/pattern-off.jpg'); height: 250px;">
            <span class="font-30 font-weight-bold py-3 px-5 rounded-sm mt-3 ">
                <img src="{{ asset('images/logo/logo_100_50.png') }}" alt="logo" class="img-fluid d-block d-md-inline mx-a">
                <span class="d-block d-md-inline text-center">بازار تهاتر ایرانیان</span>
                <div class="font-20 text-orange font-weight-bold bg-white py-1 px-5 rounded-sm mt-2 shadow-sm">اولین و تنها بازار تهاتری در ایران</div>
            </span>
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
