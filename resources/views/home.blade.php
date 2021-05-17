@extends("layouts.master")

@section("title")
    <title>صفحه اصلی | CioCe.ir</title>
@endsection

@section("content")

        <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">

                <!-- Start Main-Slider -->
                <div class="row mb-3">
                    <aside class="sidebar col-xl-2 col-lg-3 col-12 order-2 order-lg-1 pl-0 hidden-md">
                        <!-- Start banner -->
                        <div class="sidebar-inner dt-sl">
                            <div class="sidebar-banner">
                                <a href="{{route('home')}}" target="_top">
                                    <img src="/img/banner/sidebar-banner-1.gif" width="100%" height="329"
                                         alt="">
                                </a>
                            </div>
                        </div>
                        <!-- End banner -->
                    </aside>
                    <div class="col-xl-10 col-lg-9 col-12 order-1 order-lg-2">
                        <!-- Start main-slider -->
                        <section id="main-slider" class="main-slider carousel slide carousel-fade card hidden-sm"
                                 data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                                <li data-target="#main-slider" data-slide-to="1"></li>
                                <li data-target="#main-slider" data-slide-to="2"></li>
                                <li data-target="#main-slider" data-slide-to="3"></li>
                                <li data-target="#main-slider" data-slide-to="4"></li>
                                <li data-target="#main-slider" data-slide-to="5"></li>
                                <li data-target="#main-slider" data-slide-to="6"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/1.jpg)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/2.jpg)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/3.jpg)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/4.jpg)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/5.jpg)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/6.jpg)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/7.jpg)">
                                    </a>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                                <i class="mdi mdi-chevron-right"></i>
                            </a>
                            <a class="carousel-control-next" href="#main-slider" data-slide="next">
                                <i class="mdi mdi-chevron-left"></i>
                            </a>
                        </section>
                        <section id="main-slider-res"
                                 class="main-slider carousel slide carousel-fade card d-none show-sm" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#main-slider-res" data-slide-to="0" class="active"></li>
                                <li data-target="#main-slider-res" data-slide-to="1"></li>
                                <li data-target="#main-slider-res" data-slide-to="2"></li>
                                <li data-target="#main-slider-res" data-slide-to="3"></li>
                                <li data-target="#main-slider-res" data-slide-to="4"></li>
                                <li data-target="#main-slider-res" data-slide-to="5"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="main-slider-slide" href="{{route('home')}}">
                                        <img src="/img/main-slider/slider-responsive/1.jpg" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}">
                                        <img src="/img/main-slider/slider-responsive/2.jpg" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}">
                                        <img src="/img/main-slider/slider-responsive/3.jpg" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}">
                                        <img src="/img/main-slider/slider-responsive/4.jpg" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}">
                                        <img src="/img/main-slider/slider-responsive/5.jpg" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}">
                                        <img src="/img/main-slider/slider-responsive/6.jpg" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#main-slider-res" role="button" data-slide="prev">
                                <i class="mdi mdi-chevron-right"></i>
                            </a>
                            <a class="carousel-control-next" href="#main-slider-res" data-slide="next">
                                <i class="mdi mdi-chevron-left"></i>
                            </a>
                        </section>
                        <!-- End main-slider -->
                    </div>
                </div>
                <!-- End Main-Slider -->

                <!-- Start Product-Slider -->
                @include('partials.popular_products')
                <!-- End Product-Slider -->

                <!-- Start Banner -->
                <div class="row mt-3 mb-5">
                    <div class="col-sm-6 col-12 mb-2">
                        <div class="widget-banner">
                            <a href="{{route('home')}}">
                                <img src="/img/banner/medium-banner-1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 mb-2">
                        <div class="widget-banner">
                            <a href="{{route('home')}}">
                                <img src="/img/banner/medium-banner-2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Banner -->

                <!-- Start Banner -->
                <div class="row mt-3 mb-5">
                    <div class="col-md-3 col-sm-6 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="{{route('home')}}">
                                <img src="/img/banner/small-banner-5.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="{{route('home')}}">
                                <img src="/img/banner/small-banner-6.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="{{route('home')}}">
                                <img src="/img/banner/small-banner-7.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="{{route('home')}}">
                                <img src="/img/banner/small-banner-8.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Banner -->

                <!-- Start Category-Section -->
                @include('partials.category_icon')
                <!-- End Category-Section -->

                <!-- Start Product-Slider -->
                @include('partials.most_visited')
                <!-- End Product-Slider -->

                <!-- Start Banner -->
                <div class="row mt-3 mb-5">
                    <div class="col-12">
                        <div class="widget-banner">
                            <a href="{{route('home')}}">
                                <img src="/img/banner/large-banner.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Banner -->

                <!-- Start Product-Slider -->
                @include('partials.last_product')
                <!-- End Product-Slider -->

                <!-- Start Feature-Product -->
                <section class="dt-sl dt-sn mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-sm-title title-wide no-after-title-wide">
                                <h2>پیشنهاد ما</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-16742.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>1,099,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-16755.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>1,299,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-16882.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>799,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-23291.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>399,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-24984.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>199,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-25392.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>199,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-60525.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>1,099,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-63541.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>199,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="/img/website_role/website-template-66149.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="card-horizontal-product-title">
                                                <a href="#">
                                                    <h3>وب سایت معرفی و اداری</h3>
                                                </a>
                                            </div>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="card-horizontal-product-price">
                                                <span>199,000 تومان</span>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Feature-Product -->

                <!-- Start Brand-Slider -->
                <section class="slider-section dt-sl mb-5">
                    <div class="row">
                        <!-- Start Product-Slider -->
                        <div class="col-12">
                            <div class="brand-slider carousel-lg owl-carousel owl-theme">
                                <div class="item">
                                    <img src="/img/brand/1076.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="/img/brand/1078.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="/img/brand/1080.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="/img/brand/2315.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="/img/brand/1086.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="/img/brand/5189.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="/img/brand/1000006973.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="/img/brand/1000014452.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- End Product-Slider -->

                    </div>
                </section>
                <!-- End Brand-Slider -->

            </div>
        </main>
        <!-- End main-content -->
@endsection

@section('extra_js')

@endsection
