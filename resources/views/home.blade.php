@extends("layouts.master")

@section("title")
    @if(\Illuminate\Support\Str::length($setting->home_page_title) > 1)
        <title>{{ $setting->home_page_title }}</title>
    @else
        <title>فروشگاه آنلاین آرمان ماسک</title>
    @endif
    @if(\Illuminate\Support\Str::length($setting->home_page_description) > 1)
        <meta name="description" content="{{ $setting->home_page_description }}">
    @else
        <meta name="description" content="فروشگاه آنلاین آرمان ماسک">
    @endif
@endsection

@section("content")
    <!-- Start Home Slides Area -->
    @if (isset($setting) && isset($setting->home_page_slider[0]))
        <section class="home-slides owl-carousel owl-theme">
            <div class="single-banner-item">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-12">
                                    <div class="banner-image text-center">
                                        <img src="/img/banner/banner-img1.png" class="main-image" alt="تصویر">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="banner-content">
                                        <span class="sub-title">{{json_decode($setting->home_page_slider)[0]->slide_head ?? "تازه رسیده ها"}}</span>
                                        <h2><span></span> {{json_decode($setting->home_page_slider)[0]->slide_title ?? ""}}<span></span></h2>
                                        <p>{{json_decode($setting->home_page_slider)[0]->slide_text ?? ""}}</p>
                                        <div class="btn-box">
                                            <div class="d-flex align-items-center float-left">
                                                <span class="price">{{json_decode($setting->home_page_slider)[0]->slide_price ?? ""}} تومان</span>
                                                <a href="{{json_decode($setting->home_page_slider)[0]->slide_link ?? ""}}" data-id="2" class="btn btn-primary add-cart">مشاهده محصول<i class="flaticon-trolley pr-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-banner-item">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-12">
                                    <div class="banner-image text-center">
                                        <img src="/img/banner/banner-img2.png" class="main-image" alt="تصویر">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="banner-content">
                                        <span class="sub-title">{{json_decode($setting->home_page_slider)[1]->slide_head ?? "تازه رسیده ها"}}</span>
                                        <h2><span></span> {{json_decode($setting->home_page_slider)[1]->slide_title ?? ""}}<span></span></h2>
                                        <p>{{json_decode($setting->home_page_slider)[1]->slide_text ?? ""}}</p>
                                        <div class="btn-box">
                                            <div class="d-flex align-items-center float-left">
                                                <span class="price">{{json_decode($setting->home_page_slider)[1]->slide_price ?? ""}} تومان</span>
                                                <a href="{{json_decode($setting->home_page_slider)[1]->slide_link ?? ""}}" data-id="2" class="btn btn-primary add-cart">مشاهده محصول<i class="flaticon-trolley pr-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End Home Slides Area -->

    <!-- Start Banner Categories Area -->
    @if (isset($setting) && isset($setting->home_page_boxes[0]))
        <section class="banner-categories-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner-categories-box">
                        <img src="/img/banner-categories/banner-categories-img1.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">{{json_decode($setting->home_page_boxes)[1]->box_head ?? "محصول جدید"}}</span>
                            <h3><a href="{{json_decode($setting->home_page_boxes)[1]->box_link ?? "#"}}">{{json_decode($setting->home_page_boxes)[1]->box_title ?? "محصول جدید"}}</a></h3>
                            <div class="btn-box">
                                <div class="d-flex align-items-center">
                                    <a href="{{json_decode($setting->home_page_boxes)[1]->box_link ?? "#"}}" class="btn btn-primary"><span class="flaticon-trolley"></span>مشاهده کالا </a>
                                    <span class="price">{{json_decode($setting->home_page_boxes)[1]->box_price ?? ""}} تومان</span><span class="price"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="single-banner-categories-box">
                        <img src="/img/banner-categories/banner-categories-img2.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">{{json_decode($setting->home_page_boxes)[0]->box_head ?? "محصول جدید"}}</span>
                            <h3><a href="{{json_decode($setting->home_page_boxes)[0]->box_link ?? "#"}}">{{json_decode($setting->home_page_boxes)[0]->box_title ?? "محصول جدید"}}</a></h3>
                            <div class="btn-box">
                                <div class="d-flex align-items-center">
                                    <a href="{{json_decode($setting->home_page_boxes)[0]->box_link ?? "#"}}" class="btn btn-primary"><span class="flaticon-trolley"></span>مشاهده کالا </a>
                                    <span class="price">{{json_decode($setting->home_page_boxes)[0]->box_price ?? ""}} تومان</span><span class="price"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End Banner Categories Area -->

    <!-- Start Categories Area -->
        @include('partials.category_icon')
    <!-- End Categories Area -->

    <!-- Last Products Area -->
    @if(isset($lastProduct) && isset($lastProduct[0]))
        @include("partials.last_product")
    @endif
    <!-- Last Products Area -->

    <!-- Start Products Promotions Area -->
    <section class="products-promotions-area pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-products-promotions-box">
                        <img src="/img/promotions/promotions-img1.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">{{json_decode($setting->home_page_boxes)[4]->box_head ?? "محصول جدید"}}</span>
                            <h3>{{json_decode($setting->home_page_boxes)[4]->box_title ?? "محصول جدید"}}</h3>
                            <span class="discount"><span>از</span> {{json_decode($setting->home_page_boxes)[4]->box_price ?? ""}} تومان</span>
                            <a href="{{json_decode($setting->home_page_boxes)[4]->box_link ?? "#"}}" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-products-promotions-box">
                        <img src="/img/promotions/promotions-img2.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">{{json_decode($setting->home_page_boxes)[3]->box_head ?? "محصول جدید"}}</span>
                            <h3>{{json_decode($setting->home_page_boxes)[3]->box_title ?? "محصول جدید"}}</h3>
                            <span class="discount"><span>از</span> {{json_decode($setting->home_page_boxes)[3]->box_price ?? ""}} تومان</span>
                            <a href="{{json_decode($setting->home_page_boxes)[3]->box_link ?? "#"}}" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="single-products-promotions-box">
                        <img src="/img/promotions/promotions-img3.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">{{json_decode($setting->home_page_boxes)[2]->box_head ?? "محصول جدید"}}</span>
                            <h3>{{json_decode($setting->home_page_boxes)[2]->box_title ?? "محصول جدید"}}</h3>
                            <span class="discount"><span>از</span> {{json_decode($setting->home_page_boxes)[2]->box_price ?? ""}} تومان</span>
                            <a href="{{json_decode($setting->home_page_boxes)[2]->box_link ?? "#"}}" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Products Promotions Area -->

    <!-- Start Products Area -->
    @if(isset($mostVisited) && isset($mostVisited[0]))
    @include('partials.most_visited')
    @endif
    <!-- End Products Area -->

    <!-- Start Hot Deal Area -->
    <section class="hot-deal-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div id="festival_continue" class="hot-deal-content">
                        <span class="sub-title">پیشنهاد ویژه</span>
                        <h3>تا <span>5٪</span> تخفیف ماسک برای سفارش‌های تعداد بالا!</h3>
                        <div id="timer" class="flex-wrap d-flex justify-content-center">
                            <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
                        </div>
                        <a href="https://armanmask.ir/single-category/%D8%A2%D8%B1%D9%85%D8%A7%D9%86-%D9%85%D8%A7%D8%B3%DA%A9" class="btn btn-primary"><i class="flaticon-trolley"></i> اکنون خرید کنید</a>
                        <div class="back-text">2020</div>
                    </div>
                    <div id="festival_end" class="hot-deal-content d-none">
                        <span class="sub-title">پایان جشمواره</span>
                        <h5 class="mt-3">با فروشگاه آرمان تماس بگیرید و از شروع جشنواره بعدی با خبر شوید</h5>
                        <a href="{{route('contact')}}" class="btn btn-primary mt-3"><i class="flaticon-phone-ringing"></i> تماس با ما</a>
                        <div class="back-text">2022</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hot Deal Area -->

    <!-- MAIN TEXT -->
    @if(isset($setting) && isset($setting->main_text))
        <section class="brands-area pt-70 pb-40">
        <div class="container">
            <div class="section-title">
                <h1>خرید آنلاین آرمان ماسک</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-12">
                    <p>{!! $setting->main_text !!}</p>
                </div>
            </div>
            </div>
    </section>
    @endif
    <!-- MAIN TEXT -->



    <!-- Start Brands Area -->
    <section class="brands-area pt-70 pb-40">
        <div class="container">
            <div class="section-title">
                <h2>برخی از مشتریان آرمان ماسک</h2>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                    <div class="single-brands-item">
                        <a href="#" class="d-block"><img src="/img/brands/brands-img1.png" alt="تصویر"></a>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                    <div class="single-brands-item">
                        <a href="#" class="d-block"><img src="/img/brands/brands-img2.png" alt="تصویر"></a>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                    <div class="single-brands-item">
                        <a href="#" class="d-block"><img src="/img/brands/brands-img3.png" alt="تصویر"></a>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                    <div class="single-brands-item">
                        <a href="#" class="d-block"><img src="/img/brands/brands-img4.png" alt="تصویر"></a>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                    <div class="single-brands-item">
                        <a href="#" class="d-block"><img src="/img/brands/brands-img5.png" alt="تصویر"></a>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                    <div class="single-brands-item">
                        <a href="#" class="d-block"><img src="/img/brands/brands-img6.png" alt="تصویر"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Brands Area -->

    <!-- Start Blog Area -->
    @if(isset($blog_posts) && $blog_posts[0])
    @include('partials.last_post_blog')
    @endif
    <!-- End Blog Area -->
@endsection
@section('extra_js')
<script>
    // Count Time
    function makeTimer() {
        // var endTime = new Date("September 26, 2022 8:00:00 PDT");
        var endTime = new Date("{{json_decode($setting->end_festival)[0] ?? ""}} {{json_decode($setting->end_festival)[1] ?? 0}}, 2022 {{json_decode($setting->end_festival)[2] ?? 0}}:00:00");
        var endTime = (Date.parse(endTime)) / 1000;
        var now = new Date();
        var now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        if (days < 0){
            $('#festival_continue').addClass('d-none');
            $('#festival_end').removeClass('d-none');
        }
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
        if (hours == 0 && minutes == 0 && minutes < 10){
            $('#festival_continue').addClass('d-none');
            $('#festival_end').removeClass('d-none');
        }
        $("#days").html(days + "<span>روز</span>");
        $("#hours").html(hours + "<span>ساعت</span>");
        $("#minutes").html(minutes + "<span>دقیقه</span>");
        $("#seconds").html(seconds + "<span>ثانیه</span>");
    }
    setInterval(function() { makeTimer(); }, 0);
</script>
@endsection
