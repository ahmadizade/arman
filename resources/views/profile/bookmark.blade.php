@extends("layouts.master")

@section("title")
    <title>علاقمندی های من | CioCe.ir</title>
@endsection

@section("content")
        <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">
                    <!-- Start Sidebar -->
                    @include('profile.sidebar')
                    <!-- End Sidebar -->

                    <!-- Start Content -->
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2>علاقمندی ها</h2>
                                </div>
                                <div class="dt-sl">
                                    <div class="row">
                                        @if (isset($bookmark))
                                            @foreach($bookmark as $item)
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="card-horizontal-product">
                                                        <div class="card-horizontal-product-thumb">
                                                            <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}">
                                                                <img src="/uploads/thumbnail/{{$item->product->thumbnail ?? "noimage_64.jpg"}}" alt="{{$item->product_name}}">
                                                            </a>
                                                        </div>
                                                        <div class="card-horizontal-product-content">
                                                            <div class="card-horizontal-product-title">
                                                                <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}">
                                                                    <h3>{{$item->product_name}}</h3>
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
                                                                <span>{{$item->price}} تومان</span>
                                                            </div>
                                                            <div class="card-horizontal-product-buttons">
                                                                <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}" class="btn">مشاهده محصول</a>
                                                                <button class="remove-btn">
                                                                    <i class="mdi mdi-trash-can-outline"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->

                </div>
                <!-- Start Product-Slider -->
                <section class="slider-section dt-sl mt-5 mb-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="section-title text-sm-title title-wide no-after-title-wide">
                                <h2>محصولات پیشنهادی برای شما</h2>
                                <a href="#">مشاهده همه</a>
                            </div>
                        </div>

                        <!-- Start Product-Slider -->
                        <div class="col-12 px-res-0">
                            <div class="product-carousel carousel-lg owl-carousel owl-theme">
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                <span>20%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">157,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">کت مردانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                            <span class="product-price">199,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">135,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">145,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">170,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="discount">
                                                <span>20%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">185,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">تیشرت مردانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                            <span class="product-price">54,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product-Slider -->

                    </div>
                </section>
                <!-- End Product-Slider -->
            </div>
        </main>
        <!-- End main-content -->
@endsection
