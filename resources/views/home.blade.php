@extends("layouts.master")

@section("title")
    <title>صفحه اصلی | Arman</title>
@endsection

@section("content")
    <!-- Start Home Slides Area -->
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
                                    <span class="sub-title">تازه رسیده ها</span>
                                    <h1><span>دستکش</span> نیتریل تریتون گریپ<span></span></h1>
                                    <p>دستکش از دست ما در برابر چیزهای مختلف محافظت می کند. استفاده از دستکش نیتریل راحت است.</p>
                                    <div class="btn-box">
                                        <div class="d-flex align-items-center float-left">
                                            <span class="price">500000 تومان</span>
                                            <a href="#" class="default-btn"><i class="flaticon-trolley"></i>افزودن به سبد خرید </a>
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
                                    <span class="sub-title">تازه رسیده ها</span>
                                    <h1><span>دستکش</span> محافظ عینک ایمنی<span></span></h1>
                                    <p>عینک و دستکش های محافظ ما برای ایمنی شخصی بسیار مهم هستند.</p>
                                    <div class="btn-box">
                                        <div class="d-flex align-items-center float-left">
                                            <span class="price">79000 تومان</span>
                                            <a href="#" class="default-btn"><i class="flaticon-trolley"></i>افزودن به سبد خرید </a>
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
                                    <img src="/img/banner/banner-img3.png" class="main-image" alt="تصویر">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="banner-content">
                                    <span class="sub-title">تازه رسیده ها</span>
                                    <h1><span>ماسک</span> جراحی محافظ<span></span></h1>
                                    <p>ماسک های جراحی می توانند از خود در برابر میکروب های مختلف محافظت کنند. همه باید از این ماسک جراحی استفاده کنند.</p>
                                    <div class="btn-box">
                                        <div class="d-flex align-items-center float-left">
                                            <span class="price">30000 تومان</span>
                                            <a href="#" class="default-btn"><i class="flaticon-trolley"></i>افزودن به سبد خرید </a>
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
    <!-- End Home Slides Area -->

    <!-- Start Banner Categories Area -->
    <section class="banner-categories-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner-categories-box">
                        <img src="/img/banner-categories/banner-categories-img1.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">درجه حرارت</span>
                            <h3><a href="#">دماسنج گوش</a></h3>
                            <div class="btn-box">
                                <div class="d-flex align-items-center">
                                    <a href="products-left-sidebar.html" class="default-btn"><i class="flaticon-trolley"></i>خرید </a>
                                    <span class="price">49000 تومان</span><span class="price"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="single-banner-categories-box">
                        <img src="/img/banner-categories/banner-categories-img2.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">شخصی</span>
                            <h3><a href="#">مجموعه مورد علاقه</a></h3>
                            <div class="btn-box">
                                <div class="d-flex align-items-center">
                                    <a href="products-left-sidebar.html" class="default-btn"><i class="flaticon-trolley"></i>خرید </a>
                                    <span class="price">69000 تومان</span><span class="price"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <span class="sub-title">معامله ویژه</span>
                            <h3>سیب نمک مگا</h3>
                            <span class="discount"><span>تا</span> 70٪ تخفیف </span>
                            <a href="products-left-sidebar.html" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-products-promotions-box">
                        <img src="/img/promotions/promotions-img2.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">تازه رسیده ها</span>
                            <h3>ضدعفونی‌کننده</h3>
                            <span class="discount"><span>تا</span> 49000 تومان</span>
                            <a href="products-left-sidebar.html" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="single-products-promotions-box">
                        <img src="/img/promotions/promotions-img3.jpg" alt="تصویر">

                        <div class="content">
                            <span class="sub-title">مجموعه داغ</span>
                            <h3>دما سنج</h3>
                            <span class="discount"><span>تا</span> 20٪ تخفیف </span>
                            <a href="products-left-sidebar.html" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
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
                    <div class="hot-deal-content">
                        <span class="sub-title">معامله ماه</span>
                        <h2>تا <span>80٪</span> تخفیف تمام فروش ها نهایی هستند!</h2>
                        <div id="timer" class="flex-wrap d-flex justify-content-center">
                            <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
                        </div>
                        <a href="products-left-sidebar.html" class="default-btn"><i class="flaticon-trolley"></i> اکنون خرید کنید</a>
                        <div class="back-text">2020</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hot Deal Area -->

    <!-- Start Brands Area -->
    <section class="brands-area pt-70 pb-40">
        <div class="container">
            <div class="section-title">
                <h2>فروش مارک ها</h2>
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

@endsection
