@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container-fluid" style="border-top:2px solid #8b8788">
        <div class="row">
            <div class="col-12">
                <img src="/images/home/slider.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary d-none d-lg-block">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="d-flex flex-column flex-md-row justify-content-around align-items-center text-center">
                    <div class="counter-group">
                        <div class="counter text-white" data-count="150">0</div>
                        <h5 class="text-white">افراد آنلاین</h5>
                    </div>
                    <div class="counter-group">
                        <div class="counter text-white" data-count="21">0</div>
                        <h5 class="text-white">نمایندگی ها</h5>
                    </div>
                    <div class="counter-group">
                        <div class="counter text-white" data-count="8420">0</div>
                        <h5 class="text-white">اعضاء</h5>
                    </div>
                    <div class="counter-group">
                        <div class="counter text-white" data-count="3720">0</div>
                        <h5 class="text-white">محصولات</h5>
                    </div>
                    <div class="counter-group">
                        <div class="counter text-white" data-count="26">0</div>
                        <h5 class="text-white">فروش امروز</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <div class="container mt-4">
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

    @if(isset($lastProducts))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-xs-12 my-3">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line font-16">آخرین محصولات</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                    <div class="owl-carousel owl-theme owl">
                        @foreach($lastProducts as $product)
                            <a href="{{ route("shop_product_single",["id" => $product->id]) }}">
                                <div class="slider-desc text-center overflow-hidden">
                                    <div class="item">
                                        @if(is_null($product->image))
                                            <img src="/images/no-image2.png" alt="BTI">
                                        @else
                                            <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI">
                                        @endif
                                    </div>
                                    <div class="price-box rtl">
                                        <p class="mt-1 font-13 nowrap">{{ $product->product_name }}</p>
                                        @if($product->discount > 20)
                                            <div>
                                                <del class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="text-muted font-12">ریال</span></p>
                                            </div>
                                        @else
                                            <div class="mt-1">
                                                <span class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                                <p class="text-danger font-13 mt-2 nowrap"><span class="fas fa-gift fa-lg text-danger"></span>  خرید با شارژ هدیه</p>
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

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <img src="/images/home/mid-1.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    @if(isset($popular))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-xs-12 my-3">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">پربازدیدترین ها</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                        <div class="owl-carousel owl-theme owl">
                            @foreach($popular as $product)
                                <a href="{{ route("shop_product_single",["id" => $product->id]) }}">
                                    <div class="slider-desc text-center overflow-hidden">
                                        <div class="item">
                                            @if(is_null($product->image))
                                                <img src="/images/no-image2.png" alt="BTI">
                                            @else
                                                <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI">
                                            @endif
                                        </div>
                                        <div class="price-box rtl">
                                            <p class="mt-1 font-13 nowrap">{{ $product->product_name }}</p>
                                            @if($product->discount > 20)
                                                <div>
                                                    <del class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                    <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="text-muted font-12">ریال</span></p>
                                                </div>
                                            @else
                                                <div class="mt-1">
                                                    <span class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                                    <p class="text-danger font-14 mt-2 nowrap"><span class="fas fa-gift fa-lg text-danger"></span>  خرید با شارژ هدیه</p>
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

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <img src="/images/home/mid-2.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    @if(isset($randomProduct))
        <div class="container mt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-xs-12 my-3">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">محصولات تصادفی</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-container">
                    <div class="owl-carousel owl-theme owl">
                        @foreach($randomProduct as $product)
                            <a href="{{ route("shop_product_single",["id" => $product->id]) }}">
                                <div class="slider-desc text-center overflow-hidden">
                                <div class="item">
                                    @if(is_null($product->image))
                                        <img src="/images/no-image2.png" alt="BTI">
                                    @else
                                        <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI">
                                    @endif
                                </div>
                                <div class="price-box rtl">
                                    <p class="mt-1 font-13 nowrap">{{ $product->product_name }}</p>
                                    @if($product->discount > 20)
                                        <div>
                                            <del class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                            <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                            <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="text-muted font-12">ریال</span></p>
                                        </div>
                                    @else
                                        <div class="mt-1">
                                            <span class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                            <p class="text-danger font-14 mt-2 nowrap"><span class="fas fa-gift fa-lg text-danger"></span>  خرید با شارژ هدیه</p>
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

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="w-100"
                 style="background-image:url('/images/home/sale.jpg');background-position: center center;height: 250px"></div>
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
                    <i class="fas fa-file-powerpoint icon"></i>
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
                    <i class="fa fa-money icon"></i>
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
