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
                                       style="background-image: url(/img/main-slider/1.png)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/2.png)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/3.png)">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="main-slider-slide" href="{{route('home')}}"
                                       style="background-image: url(/img/main-slider/4.png)">
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

            </div>
        </main>
        <!-- End main-content -->
@endsection

@section('extra_js')

@endsection
