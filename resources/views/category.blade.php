@extends("layouts.master")
@section("title")
    @if(\Illuminate\Support\Str::length($Category->seo_title) > 1)
        <title>{{ $Category->seo_title }} - سی و سه</title>
    @else
        <title>{{ $Category->name ?? '' }} - سی و سه</title>
    @endif
    @if(\Illuminate\Support\Str::length($Category->seo_description) > 1)
        <meta name="description" content="{{ $Category->seo_description }}">
    @endif
    <meta name="robots" content="all">
    @if(\Illuminate\Support\Str::length($Category->seo_canonical) > 1)
        <link rel="canonical" href="{{ $Category->seo_canonical }}">
    @else
        <link rel="canonical" href="{{ route("category" , ["name" => $Category->slug]) }}">
    @endif
    @if(\Illuminate\Support\Str::length($Category->seo_title) > 1)
        <meta property="og:title" content="{{ $Category->seo_title }} - سی و سه">
    @else
        <meta property="og:title" content="{{ $Category->name ?? '' }} - سی و سه">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    @if(\Illuminate\Support\Str::length($Category->seo_description) > 1)
        <meta property="og:site_name" content="{{ $Category->seo_description }}">
    @endif
    <meta property="og:image" content="{{ request()->getSchemeAndHttpHost() . '/img/uploads/category/' . $Category->image ?? '/img/home/logo.png'}}">
@endsection

@section("content")
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">

            <!-- Start Main-Slider -->
            <div class="row mb-5">
                <aside class="sidebar col-lg-4 hidden-md order-2 pr-0 hidden-md">
                    <!-- Start banner -->
                    <div class="sidebar-inner dt-sl">
                        <div class="sidebar-banner">
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <div class="widget-banner">
                                        <a href="#">
                                            <img src="/img/banner/banner-side-slider-1.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="widget-banner">
                                        <a href="#">
                                            <img src="/img/banner/banner-side-slider-2.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End banner -->
                </aside>
                <div class="col-lg-8 col-md-12 order-1">
                    <!-- Start main-slider -->
                    <section id="main-slider"
                             class="main-slider main-slider-cs mt-1 carousel slide carousel-fade card hidden-sm"
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
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/img-slider-2/1.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/img-slider-2/2.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/img-slider-2/3.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/img-slider-2/4.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/img-slider-2/5.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/img-slider-2/6.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/img-slider-2/7.jpg" alt="" class="img-fluid">
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
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/slider-responsive/1.jpg" alt=""
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/slider-responsive/2.jpg" alt=""
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/slider-responsive/3.jpg" alt=""
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/slider-responsive/4.jpg" alt=""
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
                                    <img src="/img/main-slider/slider-responsive/5.jpg" alt=""
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="main-slider-slide" href="#">
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

        </div>
@if(isset($products))
        <!-- Start Product-Slider -->
        <section class="slider-section mb-5 amazing-section" style="background: #ef394e">
            <div class="container main-container">
                <div class="row mb-3">
                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="product-carousel carousel-lg owl-carousel owl-theme">
                            <div class="item">
                                <div class="amazing-product text-center pt-5">
                                    <a href="#">
                                        <img src="/img/theme/amazing-1.png" alt="">
                                    </a>
                                    <a href="#" class="view-all-amazing-btn">
                                        مشاهده همه
                                    </a>
                                </div>
                            </div>
                            @foreach($products as $item)
                                <div class="item" style="min-height: 300px">
                                    <div class="product-card">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                @if($item->discount > 0)
                                                    <span>{{$item->discount}}%</span>
                                                @elseif($item->discount == 0)
                                                    <span>بدون تخفیف</span>
                                                @endif
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="{{ route("single_product",["slug" => $item->product_slug]) }}">
                                            <img src="/uploads/thumbnail/{{$item->thumbnail}}" alt="{{$item->product_name}}" style="width: 200px;height: 130px;">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="{{ route("single_product",["slug" => $item->product_slug]) }}" class="text-truncate">{{$item->product_name}}</a>
                                            </h5>
                                            <a class="product-meta text-truncate mt-2" href="{{ route("single_product",["slug" => $item->product_slug]) }}">{{$item->category->name}}</a>
                                            <span class="product-price">
                                                @if ($item->price > 0)
                                                    قیمت :                                         {{number_format($item->price)}} تومان
                                                @elseif ($item->price == 0)
                                                    <span class="text-danger">قیمت : رایگان</span>
                                                @endif
                                            </span>
                                            <div class="mt-4">
                                                <span class="product-meta d-inline"><i class="fa fa-eye"></i> {{$item->view}}</span>
                                                <span class="product-meta d-inline"><i class="fa fa-bookmark pr-2"></i></span>
                                                <span class="product-meta d-inline"><i class="fa fa-thumbs-up pr-3"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </div>
        </section>
        <!-- End Product-Slider -->
@endif
        <div class="container main-container">

        <!-- Start Product-Slider -->
        @include('partials.popular_products')
        <!-- End Product-Slider -->

            <!-- Start Banner -->
            <div class="row mt-3 mb-5">
                <div class="col-sm-6 col-12 mb-2">
                    <div class="widget-banner">
                        <a href="#">
                            <img src="/img/banner/medium-banner-1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-12 mb-2">
                    <div class="widget-banner">
                        <a href="#">
                            <img src="/img/banner/medium-banner-2.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Banner -->

        </div>
@if(isset($mostViewproducts))
        <!-- Start Product-Slider -->
        <section class="slider-section mb-5 amazing-section" style="background: #304ffe">
            <div class="container main-container">
                <div class="row mb-3">
                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="product-carousel carousel-lg owl-carousel owl-theme">
                            <div class="item">
                                <div class="amazing-product text-center pt-5">
                                    <a href="#">
                                        <img src="/img/theme/amazing-1.png" alt="">
                                    </a>
                                    <a href="#" class="view-all-amazing-btn">
                                        مشاهده همه
                                    </a>
                                </div>
                            </div>
                            @foreach($mostViewproducts as $item)
                                <div class="item" style="min-height: 300px">
                                    <div class="product-card">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                @if($item->discount > 0)
                                                    <span>{{$item->discount}}%</span>
                                                @elseif($item->discount == 0)
                                                    <span>بدون تخفیف</span>
                                                @endif
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="{{ route("single_product",["slug" => $item->product_slug]) }}">
                                            <img src="/uploads/thumbnail/{{$item->thumbnail}}" alt="{{$item->product_name}}" style="width: 200px;height: 130px;">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="{{ route("single_product",["slug" => $item->product_slug]) }}" class="text-truncate">{{$item->product_name}}</a>
                                            </h5>
                                            <a class="product-meta text-truncate mt-2" href="{{ route("single_product",["slug" => $item->product_slug]) }}">{{$item->category->name}}</a>
                                            <span class="product-price">
                                                @if ($item->price > 0)
            قیمت :                                         {{number_format($item->price)}} تومان
                                                @elseif ($item->price == 0)
                                                    <span class="text-danger">قیمت : رایگان</span>
                                                @endif
                                            </span>
                                            <div class="mt-4">
                                                <span class="product-meta d-inline"><i class="fa fa-eye"></i> {{$item->view}}</span>
                                                <span class="product-meta d-inline"><i class="fa fa-bookmark pr-2"></i></span>
                                                <span class="product-meta d-inline"><i class="fa fa-thumbs-up pr-3"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </div>
        </section>
        <!-- End Product-Slider -->
@endif
        <div class="container main-container">
            <!-- Start Banner -->
            <div class="row mt-3 mb-5">
                <div class="col-md-3 col-sm-6 col-6 mb-2">
                    <div class="widget-banner">
                        <a href="#">
                            <img src="/img/banner/small-banner-5.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 mb-2">
                    <div class="widget-banner">
                        <a href="#">
                            <img src="/img/banner/small-banner-6.png" alt="Free Address SQL Table">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 mb-2">
                    <div class="widget-banner">
                        <a href="#">
                            <img src="/img/banner/small-banner-7.png" alt="Free Product SQL Table">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 mb-2">
                    <div class="widget-banner">
                        <a href="#">
                            <img src="/img/banner/small-banner-8.png" alt="Free User SQL Table">
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Banner -->


            <!-- Start Product-Slider -->
            <section class="slider-section dt-sl mb-5">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide no-after-title-wide">
                            <h2>پر فروش ترینها</h2>
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>

                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="product-carousel carousel-lg owl-carousel owl-theme">
                            @foreach($lastProduct as $item)
                                <div class="item" style="min-height: 300px">
                                    <div class="product-card">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                @if($item->discount > 0)
                                                    <span>{{$item->discount}}%</span>
                                                @elseif($item->discount == 0)
                                                    <span>بدون تخفیف</span>
                                                @endif
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="{{ route("single_product",["slug" => $item->product_slug]) }}">
                                            <img src="/uploads/thumbnail/{{$item->thumbnail}}" alt="{{$item->product_name}}">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="{{ route("single_product",["slug" => $item->product_slug]) }}" class="text-truncate" style="font-size: 13px">{{$item->product_name}}</a>
                                            </h5>
                                            <a class="product-meta text-truncate mt-2" href="{{ route("single_product",["slug" => $item->product_slug]) }}">دسته بندی : {{$item->category->name}}</a>
                                            <span class="product-price">
                                                @if ($item->price > 0)
            قیمت :                                         {{number_format($item->price)}} تومان
                                                @elseif ($item->price == 0)
                                                    <span class="text-danger">قیمت : رایگان</span>
                                                @endif
                                </span>
                                            <div class="mt-4">
                                                <span class="product-meta d-inline"><i class="fa fa-eye"></i> {{$item->view}}</span>
                                                <span class="bookmark_btn product-meta d-inline"><i data-id="{{$item->id}}" class="fa fa-bookmark pr-2"></i></span>
                                                <span class="product-meta d-inline"><i class="fa fa-thumbs-up pr-3"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </section>
            <!-- End Product-Slider -->

            <!-- Start Banner -->
            <div class="row mt-3 mb-5">
                <div class="col-12">
                    <div class="widget-banner">
                        <a href="#">
                            <img src="/img/banner/large-banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Banner -->
        </div>
    </main>
    <!-- End main-content -->
@endsection
