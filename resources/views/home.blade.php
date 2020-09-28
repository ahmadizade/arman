@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")


    {{--    Top Picture--}}
    <div class="site-blocks-cover" style="background-image:url({{url('/images/samin/samintakhfif-last-01.jpg')}})"
         data-aos="fade"
         id="home-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 mt-lg-5 text-center">
                    <div class="single-text owl-carousel">
                        <div class="slide">
                            <h1 class="text-uppercase text-secondary" data-aos="fade-up">بازار تهاتر ایرانیان</h1>
                            <p class="mb-5 desc text-secondary" data-aos="fade-up" data-aos-delay="100">
                                www.Bazarti.com </p>
                            <div data-aos="fade-up" data-aos-delay="100">
                            </div>
                        </div>

                        <div class="slide">
                            <h1 class="text-uppercase text-secondary" data-aos="fade-up">شارژ بیشتر ، خرید آسانتر</h1>
                            <p class="mb-5 desc text-secondary" data-aos="fade-up" data-aos-delay="100">
                                Www.SaminTakhfif.Com </p>
                        </div>

                        <div class="slide">
                            <h1 class="text-uppercase text-secondary" data-aos="fade-up">پرداخت از طریق اپ کارت به
                                کارت</h1>
                            <p class="mb-5 desc text-secondary" data-aos="fade-up" data-aos-delay="100">Download
                                Application</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a href="#next" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
        </a>
    </div>




    {{--کیف پول--}}
    <div class="site-section" id="next">
        {{--        <div class="container">--}}
        {{--            <div class="row">--}}
        {{--                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="">--}}
        {{--                    <figure class="circle-bg">--}}
        {{--                        <img src="images/product/h1.jpg" alt="Bazar Tahator Iranian"--}}
        {{--                             class="img-fluid samin-pages mb-4"></figure>--}}
        {{--                    <h3 class="card-title">ثمین تخفیف</h3>--}}
        {{--                    <p>با هر پرداخت %10 شارژ اضافه میگیری</p>--}}
        {{--                </div>--}}
        {{--                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="100">--}}
        {{--                    <img src="images/product/h2.jpg" alt="Bazar Tahator Iranian"--}}
        {{--                         class="img-fluid samin-pages mb-4">--}}
        {{--                    <h3 class="card-title">ثمین سررسید</h3>--}}
        {{--                    <p>الان بخر 6 ماه دیگه پول بده</p>--}}
        {{--                </div>--}}
        {{--                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="200">--}}
        {{--                    <img src="images/product/h3.jpg"--}}
        {{--                         alt="Bazar Tahator Iranian" class="img-fluid samin-pages mb-4">--}}
        {{--                    <h3 class="card-title">ثمین تعویض</h3>--}}
        {{--                    <p>بازار تهاتر ایرانیان</p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="">
                    <img src="images/icon/1.png" alt="Bazar Tahator Iranian"
                         class="img-fluid w-25 mb-4">
                    <h3 class="card-title">شارژ کیف پول</h3>
                    <p>10% افزایش اعتبار با شارژ کیف پول</p>
                </div>
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="100">
                    <img id="add-store-btn" src="images/icon/2.png" alt="Bazar Tahator Iranian"
                         class="img-fluid pointer-event w-25 mb-4">
                    <h3 class="card-title">ثبت آنلاین فروشگاه</h3>
                    <p>ارتباط بین فروشنده و خریدار بدون واسته</p>
                </div>
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="200">
                    <img src="images/icon/3.png"
                         alt="Bazar Tahator Iranian" class="img-fluid w-25 mb-4">
                    <h3 class="card-title">ثمین کارت ها</h3>
                    <p>آشنایی بیشتر با انواع ثمین کارت</p>
                </div>
            </div>
        </div>
    </div>

    {{--    موبایل Home page--}}
{{--    <div class="container overflow-hidden">--}}
{{--        <div class="row text-center">--}}
{{--            <div class="col-md-12 text-center myfont aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">--}}
{{--                <img src="images/samin/mobile-trans.png" alt="Bazar Tahator Iranian" class="img-fluid mb-4">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-12">
                <img class=" w-100" src="{{url('/images/gif/download.gif')}}">
            </div>
        </div>
    </div>


    {{--    موبایل Home page--}}

    {{--تبلیق فروشگاه ها--}}
    <div class="third-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4 text-center myfont aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
{{--                    <img src="images/product/mba4.jpg" alt="Bazar Tahator Iranian" class="img-fluid w-100 mb-4">--}}
                    <h3 class="card-title text-primary">BAZARTI APPLICATION</h3>
                    <p>شما میتوانید اپ بازارتی را از سایت بازار یا بازارتی دانلود کنید</p>
                    <p>اگر موقع نصب مشکلی داشتی با پشتیبانی دوازده هفت بیست و چهار ما تماس بگیر</p>
                    <a class="fr__btn text-white">پشتیبانی آنلاین</a>
                </div>
                <div class="col-md-4 text-center myfont aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <img src="images/samin/mobile-trans.png" alt="Bazar Tahator Iranian" class="img-fluid w-100 mb-4">
                </div>
                <div class="col-md-4 text-center myfont aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
{{--                    <img src="images/product/mmba44.jpg" alt="Bazar Tahator Iranian" class="img-fluid w-100 mb-4">--}}
                    <h3 class="card-title text-primary">CMS APPLICATION</h3>
                    <p>اپلیکیشن کارت به کارت بازارتی امکان پرداخت اعتبار و خرید از سایت را به شما می دهد</p>
                    <p>تازه می تونی تو قرعه کشی ما هم از این طریق ثبت نام کنید</p>
                    <a class="fr__btn text-white">کاربر طلایی</a>
                </div>
            </div>
        </div>
    </div>
    {{--تبلیق فروشگاه ها--}}

    {{--بازار مبل ایران--}}
    <div id="fourth" class="my-5">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-center my-5">
                <img src="images/product/1 (1).png" alt="Bazar Tahator Iranian" class="special-commerc img-fluid w-75">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-center">
                <div class="fr__prize__inner text-center mt-5">
                    <h4 class="text-primary">بزرگترین مرکز فروش مبل در ایران و خاورمیانه</h4>
                    <h5>بیش از 400 فروشگاه فعال</h5>
                    <h4>بازار بزرگ مبل ایران</h4>
                    <a class="fr__btn" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    {{--بازار مبل ایران--}}


    <div class="text-center text-black w-100 my-4">
        <p class="font-20">بیش از یک دهه سابقه کار در فروش لایسنس</p>
        <p class="text-secondary font-14">بیش از یک دهه خدمتگذار شما همراهان همیشگی بوده ایم و به امید خداوند و همراهی شما عزیزان به جهانی شدن
            می اندیشیم</p>
    </div>

    <div class="container mt-0">
        <div class="row">
            <div class="col-12 col-md-12">
                <img class=" w-100" src="{{url('/images/samin/middle/mid-mobl.jpg')}}">
            </div>
        </div>
        <!--< mid shape>-->
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mid-shape">
                        <div class="mid-shapemask"></div>
                        <span><i><a href=""><img class="logo-shape" src="{{url('/images/logo/logo_50_22.png')}}" alt=""></a></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!--< mid shape>-->
    </div>



    {{--        آخرین محصولات slider--}}
    @if(isset($lastProducts))
        <div class="container mt-5 overflow-hidden">
            <div class="row align-items-center justify-content-center">
                <div class="col-xs-12 my-3">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">آخرین محصولات</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-container">
                    <div id="owl-food" class="owl-carousel owl-theme">
                        @foreach($lastProducts as $product)
                            <div class="slider-desc text-center overflow-hidden">
                                <div class="item">
                                    @if(is_null($product->image))
                                        <img src="{{ url('/images/about.jpg') }}" alt="BTI">
                                    @else
                                        <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI">
                                    @endif
                                </div>
                                <div class="price-box rtl">
                                    <p class="mt-1 font-13 nowrap">{{ $product->product_name }}</p>
                                    <del class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span
                                                class="font-12">ریال</span></del>
                                    <span class="badge badge-danger nowrap font-14 mt-1">{{ $product->discount }}<span>%</span></span>
                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * $product->discount) / 100)) }}
                                        <span class="text-muted font-12">ریال</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
{{--            <!--< mid shape>-->--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="mid-shape">--}}
{{--                            <div class="mid-shapemask"></div>--}}
{{--                            <span><i><a href=""><img class="logo-shape" src="{{url('/images/logo/logo_50_22.png')}}" alt=""></a></i></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--< mid shape>-->--}}

        </div>
    @endif
    {{--        آخرین محصولات slider--}}


    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-12 middle-pic w-100"
                 style="background-image:url({{url('/images/samin/middle/1.jpg')}})">
            </div>
        </div>
    </div>


    {{--پربازدیدترین ها--}}
    @if(isset($popular))
        <div class="container mt-5 overflow-hidden">
            <div class="row align-items-center justify-content-center">
                <div class="col-xs-12 my-3">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">پربازدیدترین ها</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-container">
                    <div id="owl-food" class="owl-carousel owl-theme">
                        @foreach($popular as $product)
                            <div class="slider-desc text-center overflow-hidden">
                                <div class="item">
                                    @if(is_null($product->image))
                                        <img src="{{ url('/images/about.jpg') }}" alt="BTI">
                                    @else
                                        <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI">
                                    @endif
                                </div>
                                <div class="price-box rtl">
                                    <p class="mt-1 font-13 nowrap">{{ $product->product_name }}</p>
                                    <del class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span
                                                class="font-12">ریال</span></del>
                                    <span class="badge badge-danger nowrap font-14 mt-1">{{ $product->discount }}<span>%</span></span>
                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * $product->discount) / 100)) }}
                                        <span class="text-muted font-12">ریال</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{--پربازدیدترین ها--}}


    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-12 middle-pic w-100"
                 style="background-image:url({{url('/images/samin/middle/mid-2.jpg')}})">
            </div>
        </div>
    </div>


    {{--محصولات تصادفی--}}
    @if(isset($randomProduct))
        <div class="container mt-5 overflow-hidden">
            <div class="row align-items-center justify-content-center">
                <div class="col-xs-12 my-3">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">محصولات تصادفی</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-container">
                    <div id="owl-food" class="owl-carousel owl-theme">
                        @foreach($randomProduct as $product)
                            <div class="slider-desc text-center overflow-hidden">
                                <div class="item">
                                    @if(is_null($product->image))
                                        <img src="{{ url('/images/about.jpg') }}" alt="BTI">
                                    @else
                                        <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI">
                                    @endif
                                </div>
                                <div class="price-box rtl">
                                    <p class="mt-1 font-13 nowrap">{{ $product->product_name }}</p>
                                    <del class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span
                                                class="font-12">ریال</span></del>
                                    <span class="badge badge-danger nowrap font-14 mt-1">{{ $product->discount }}<span>%</span></span>
                                    <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * $product->discount) / 100)) }}
                                        <span class="text-muted font-12">ریال</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{--محصولات تصادفی--}}



    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-12 middle-pic w-100"
                 style="background-image:url({{url('/images/samin/middle/mid-3.webp')}})">
            </div>
        </div>
    </div>



    {{--            لباس زنانه--}}
    <div class="container overflow-hidden">
        <div class="row align-items-center justify-content-center">
            <div class="col-xs-12 my-5">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">لباس زنانه</h2>
                    <p>با بیش از 600 فروشگاه فعال در عرصه پوشاک</p>
                </div>
            </div>
        </div>
        <div class="owl-container">
            <div id="owl-demo-1" class="owl-carousel owl-theme">

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a3.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه نگار</p>
                        <del class="text-muted">420,000</del>
                        <span class="badge badge-danger">38%</span>
                        <p class="text-danger">290,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a4.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه تندیس</p>
                        <del class="text-muted">320,000</del>
                        <span class="badge badge-danger">25%</span>
                        <p class="text-danger">270,000</p>
                    </div>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a5.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه کابریس</p>
                        <del class="text-muted">170,000</del>
                        <span class="badge badge-danger">15%</span>
                        <p class="text-danger">150,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a6.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه جاست انجل</p>
                        <del class="text-muted">420,000</del>
                        <span class="badge badge-danger">35%</span>
                        <p class="text-danger">375,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/g1.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه مارکت پارس</p>
                        <del class="text-muted">640,000</del>
                        <span class="badge badge-danger">45%</span>
                        <p class="text-danger">428,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a3.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه پارسیان</p>
                        <del class="text-muted">410,000</del>
                        <span class="badge badge-danger">25%</span>
                        <p class="text-danger">325,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a3.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه پارالل</p>
                        <del class="text-muted">1,100,000</del>
                        <span class="badge badge-danger">51%</span>
                        <p class="text-danger">499,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--            لباس زنانه--}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-12 middle-pic w-100"
                 style="background-image:url({{url('/images/samin/middle/mid-4.jpg')}})">
            </div>
        </div>
    </div>


    {{--خدمات والپیپر--}}
    <div class="col-xs-12 my-5">
        <div class="section__title--2 text-center">
            <h2 class="title__line">ثمین تخفیف و خدمات</h2>
            <p>با ثمین تخفیف می توانید از تمام خدمات داخل سایت تهاتر ایرانیان، با تخفیف های باور نکردنی بهرهمند شوید</p>
        </div>
    </div>

    <div class="site-blocks-cover w-100 h-75" style="background-image:url({{url('/images/product/100.jpg')}})"
         data-aos="fade">
    </div>

    <

    {{--             خدمات منزل--}}
    <div class="container mt-5 overflow-hidden">
        <div class="row align-items-center justify-content-center">
            <div class="col-xs-12 my-5">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">خدمات منزل</h2>
                    <p>با بیش از 1400 شرکت و افراد فعال در عرصه خدمات منزل</p>
                </div>
            </div>
        </div>
        <div class="owl-container">
            <div id="home-service" class="owl-carousel owl-theme">


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_light_fixtures.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">36%</span>
                    </div>
                    <p class="mt-1 text-danger">برق و سیم کشی</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_alias_accent_wall_painting.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">16%</span>
                    </div>
                    <p class="mt-1 text-danger">نقاشی ساختمان</p>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_mount_tv.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">19%</span>
                    </div>
                    <p class="mt-1 text-danger">نصب و جابجایی</p>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_hanging_pictures_shelves.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">29%</span>
                    </div>
                    <p class="mt-1 text-danger">طراحی داخلی</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_furniture_assembly.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">30%</span>
                    </div>
                    <p class="mt-1 text-danger">تعمیر و تعویض</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_other_electrical.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">30%</span>
                    </div>
                    <p class="mt-1 text-danger">خدمات تلفن</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_vacation_rental_cleaning.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">17%</span>
                    </div>
                    <p class="mt-1 text-danger">طراحی داخلی</p>
                </div>


            </div>
        </div>
    </div>
    {{--             خدمات منزل--}}



    {{--             خدمات ساختمان--}}
    <div class="container mt-5 overflow-hidden">
        <div class="row align-items-center justify-content-center">
            <div class="col-xs-12 my-5">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">خدمات ساختمانی</h2>
                    <p>با بیش از 900 بنگاه، شرکت و افراد فعال در عرصه خدمات ساختمانی</p>
                </div>
            </div>
        </div>
        <div class="owl-container text-center">
            <div id="apartment-service" class="owl-carousel owl-theme">


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/door-1.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">36%</span>
                    </div>
                    <p class="mt-1 text-danger">درب و پنجره</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/cold-1.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">16%</span>
                    </div>
                    <p class="mt-1 text-danger">نصب و تعمیر کولر</p>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/heat-1.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">19%</span>
                    </div>
                    <p class="mt-1 text-danger">نصب و تعمیر گاز</p>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/cabinet.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">29%</span>
                    </div>
                    <p class="mt-1 text-danger">نصب و تعمیر کابینت</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img
                                src="{{url('../images/services/hood-1.jpg')}}"
                                alt="Owl Image">
                        <span class="product-sale-top">30%</span>
                    </div>
                    <p class="mt-1 text-danger">ایزوگام</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/moket-1.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">30%</span>
                    </div>
                    <p class="mt-1 text-danger">شستشوی و نصب موکت</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/hayat-2.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">17%</span>
                    </div>
                    <p class="mt-1 text-danger">حیاط سازی</p>
                </div>
            </div>
        </div>
        <img class="img-fluid" src="{{url('/images/samin/online-shoping-2.jpg')}}">
    </div>
    {{--             خدمات ساختمان--}}


@endsection

@section('extra_js')
    <script src="{{url('/js/app_jquery.js')}}"></script>
@stop
