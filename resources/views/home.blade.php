@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container-fluid" style="border-top:2px solid #8b8788">
        <div class="row">
            <img src="/images/bg/slider.jpg" class="img-fluid" alt="">
        </div>
    </div>

    <div class="container-fluid bg-primary">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="d-flex flex-column flex-md-row justify-content-around align-items-center text-center" >
                    <div class="counter-group">
                        <div class="counter text-white" data-count="150">0</div>
                        <h5 class="text-white">همراهان</h5>
                    </div>
                    <div class="counter-group">
                        <div class="counter text-white" data-count="85">0</div>
                        <h5 class="text-white">نمایندگی ها</h5>
                    </div>
                    <div class="counter-group">
                        <div class="counter text-white" data-count="85">0</div>
                        <h5 class="text-white">نمایندگی ها</h5>
                    </div>
                    <div class="counter-group">
                        <div class="counter text-white" data-count="2200">0</div>
                        <h5 class="text-white">محصولات</h5>
                    </div>
                    <div class="counter-group">
                        <div class="counter text-white" data-count="12">0</div>
                        <h5 class="text-white">فروش امروز</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-6 col-lg-3 text-center mt-3">
                <img src="images/icon/1.png" alt="Bazar Tahator Iranian"
                     class="img-fluid w-25 mb-4">
                <h3 class="card-title">ثبت فروشگاه</h3>
                <p>فروشگاهت و ثبت کن، درآمد کسب کن</p>
            </div>
            <div class="col-6 col-lg-3 text-center mt-3">
                <img id="add-store-btn" src="images/icon/2.png" alt="Bazar Tahator Iranian"
                     class="img-fluid pointer-event w-25 mb-4">
                <h3 class="card-title">طلایی شو</h3>
                <p>طلایی شو، شارژ بیشتر بگیر</p>
            </div>
            <div class="col-6 col-lg-3 text-center mt-3">
                <img id="add-store-btn" src="images/icon/2.png" alt="Bazar Tahator Iranian"
                     class="img-fluid pointer-event w-25 mb-4">
                <h3 class="card-title">کارت هواداری</h3>
                <p>از تیم محبوبت حمایت کن</p>
            </div>
            <div class="col-6 col-lg-3 text-center mt-3">
                <img id="add-store-btn" src="images/icon/2.png" alt="Bazar Tahator Iranian"
                     class="img-fluid pointer-event w-25 mb-4">
                <h3 class="card-title">پشتیبانی 24 ساعته</h3>
                <p>فروشگاهت و ثبت کن، درآمد کسب کن</p>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mt-3">
                <h3 class="card-title text-primary">BAZARTI APPLICATION</h3>
                <p>شما میتوانید اپ بازارتی را از سایت بازار یا بازارتی دانلود کنید</p>
                <p>اگر موقع نصب مشکلی داشتی با پشتیبانی دوازده هفت بیست و چهار ما تماس بگیر</p>
                <a class="fr__btn text-white">پشتیبانی آنلاین</a>
            </div>
            <div class="col-md-4 text-center mt-3">
                <img src="images/samin/mobile-trans.png" alt="Bazar Tahator Iranian" class="img-fluid w-100 mb-4">
            </div>
            <div class="col-md-4 text-center mt-3">
                <h3 class="card-title text-primary">CMS APPLICATION</h3>
                <p>اپلیکیشن کارت به کارت بازارتی امکان پرداخت اعتبار و خرید از سایت را به شما می دهد</p>
                <p>تازه می تونی تو قرعه کشی ما هم از این طریق ثبت نام کنید</p>
                <a class="fr__btn text-white">کاربر طلایی</a>
            </div>
        </div>
    </div>

    <div class="container-fluid border-top border-bottom bg-light mt-3 py-2">
        <div class="row">
            <div class="col-12 col-lg-6 text-center mt-3">
                <img src="images/product/1 (1).png" alt="Bazar Tahator Iranian" class="img-fluid mb-2">
            </div>
            <div class="col-12 col-lg-6 text-center mt-3">
                <div class="fr__prize__inner text-center">
                    <h4 class="text-primary mb-2">بزرگترین مرکز فروش مبل در ایران و خاورمیانه</h4>
                    <h5 class="mb-2">بیش از 400 فروشگاه فعال</h5>
                    <h4 class="mb-2">بازار بزرگ مبل ایران</h4>
                    <a class="fr__btn mb-2" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="text-center text-black w-100 my-4">
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
    </div>--}}

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
                <div class="owl-container">
                    <div class="owl-carousel owl-theme owl">
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
        </div>
    @endif

    <div class="container mt-3">
        <div class="row">
            <img src="{{url('/images/samin/middle/1.jpg')}}" class="img-fluid" alt="">
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
                <div class="owl-container">
                    <div class="owl-carousel owl-theme owl">
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

    <div class="container mt-3">
        <div class="row">
            <img src="{{url('/images/samin/middle/mid-2.jpg')}}" class="img-fluid" alt="">
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
                <div class="owl-container">
                    <div class="owl-carousel owl-theme owl">
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

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="w-100" style="background-image:url({{url('/images/product/100.jpg')}});background-attachment: fixed;background-position: center center;height: 250px"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @if(isset($randomProduct))
                @foreach($randomProduct as $item)
                    <div class="col-12 col-lg-4">
                        <div class="card shadow-sm mt-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 d-flex align-self-center">
                                    @if(is_null($item['image']))
                                        <img src="{{ url('/images/about.jpg') }}" class="card-img"
                                             alt="No Image">
                                    @else
                                        <img src="{{ Storage::disk('vms')->url($item['image']) }}"
                                             class="card-img"
                                             alt="...">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1 font-15 nowrap">@if($item['stock'] == 1) <span
                                                class="badge badge-secondary font-weight-normal">نو</span>  @else
                                                <span
                                                    class="badge badge-secondary font-weight-normal">کارکرده</span>  @endif
                                            | {{ $item['product_name'] }}</h5>
                                        0 <p class="card-text mb-1"><span
                                                class="text-muted font-12">قیمت:</span>
                                            <span class="font-18">{{ number_format($item['price']) }}</span> |
                                            <span
                                                class="badge badge-danger font-14 font-weight-normal">%{{$item['discount']}} تخفیف </span>
                                        </p>
                                        <p class="card-text"><span
                                                class="text-muted font-12">موجودی:</span> {{$item['quantity']}}
                                            عدد |
                                            <span
                                                class="text-muted font-12">تاریخ:</span><span> {{ \Morilog\Jalali\Jalalian::forge($item['created_at'])->format("Y/m/d") }} </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
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
            dots:false,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                    margin:10
                },
                600: {
                    items: 3,
                    nav: false,
                    margin:10
                },
                1000: {
                    items: 5,
                    nav: false,
                    margin:10
                }
            }
        });
    </script>
    <script src="/js/app_jquery.js"></script>
@endsection
