@extends("layouts.master")

@section("title")
    @if(\Illuminate\Support\Str::length($product->seo_title) > 1)
        <title>{{ $product->seo_title }} - آرمان</title>
    @else
        <title>{{ $product->product_name ?? '' }} - آرمان</title>
    @endif
    @if(\Illuminate\Support\Str::length($product->seo_description) > 1)
        <meta name="description" content="{{ $product->seo_description }}">
    @endif
    <meta name="robots" content="all">
    @if(\Illuminate\Support\Str::length($product->seo_canonical) > 1)
        <link rel="canonical" href="{{ $product->seo_canonical }}">
    @else
        <link rel="canonical" href="{{ url()->full() }}">
    @endif
    @if(\Illuminate\Support\Str::length($product->seo_title) > 1)
        <meta property="og:title" content="{{ $product->seo_title }} - آرمان">
    @else
        <meta property="og:title" content="{{ $product->product_name ?? '' }} - آرمان">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    @if(\Illuminate\Support\Str::length($product->seo_description) > 1)
        <meta property="og:site_name" content="{{ $product->seo_description }}">
    @endif
    <meta property="og:image" content="{{ request()->getSchemeAndHttpHost() . '/img/uploads/product/' . $product->thumbnail ?? '/img/home/logo.png'}}">

@endsection

@section("content")
    @if(isset($product))
    <!-- Start main-content -->
    @if ($errors->any())
        <div class="alert alert-danger mb-2">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has("status"))
        <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
    @endif



    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>{{$product->category->name}}</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li><a href="{{route('contact')}}">تماس با ما</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->




    <!-- Start Product Details Area -->
    <section class="product-details-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="products-details-image">
                        <img class="img-fluid w-75" src="/uploads/thumbnail/{{$product->thumbnail}}" alt="تصویر">
                        <ul class="products-details-image-slides owl-theme owl-carousel" data-slider-id="1">
                            <li><img src="/img/products/products-img1.jpg" alt="تصویر"></li>
                            <li><img src="/img/products/products-img2.jpg" alt="تصویر"></li>
                            <li><img src="/img/products/products-img3.jpg" alt="تصویر"></li>
                            <li><img src="/img/products/products-img4.jpg" alt="تصویر"></li>
                        </ul>

                        <!-- Carousel Thumbs -->
                        <div class="owl-thumbs products-details-image-slides-owl-thumbs" data-slider-id="1">
                            <div class="owl-thumb-item">
                                <img src="/img/products/products-img1.jpg" alt="تصویر">
                            </div>

                            <div class="owl-thumb-item">
                                <img src="/img/products/products-img2.jpg" alt="تصویر">
                            </div>

                            <div class="owl-thumb-item">
                                <img src="/img/products/products-img3.jpg" alt="تصویر">
                            </div>

                            <div class="owl-thumb-item">
                                <img src="/img/products/products-img4.jpg" alt="تصویر">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="products-details-desc">
                        <h3>{{$product->product_name}}</h3>
                        <div class="price">
                            @if($product->discount > 0)
                                <span class="old-price">
                                    @if ($product->price > 0)
                                        {{number_format($product->price)}} تومان
                                    @elseif ($product->price == 0)
                                        <span class="text-danger" style="font-size: 20px">رایگان</span>
                                    @endif
                                </span>
                                <span class="new-price">{{$product->price - ($product->price * $product->discount) / 100}} تومان</span>
                            @else
                                <span class="new-price">
                                    @if ($product->price > 0)
                                        {{number_format($product->price)}} تومان
                                    @elseif ($product->price == 0)
                                        <span class="text-danger" style="font-size: 20px">رایگان</span>
                                    @endif
                                </span>
                            @endif
                        </div>

                        <div class="products-review">
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                        </div>

                        <ul class="products-info">
                            <li><span>دسته بندی: </span> <a href="{{route('single_category',["slug" => $product->category->slug])}}">{{$product->category->name ?? ""}}</a></li>
                            <li><span>موجودی: </span> موجود است</li>
                        </ul>

                        <div class="products-info-btn mt-2">
                            <a href="customer-service.html"><i class="bx bxs-truck"></i> تماس با واحد فروش</a>
                        </div>

                        <div class="products-add-to-cart">
{{--                            <div class="input-counter">--}}
{{--                                <span class="minus-btn"><i class="bx bx-minus"></i></span>--}}
{{--                                <input type="text" value="1" min="1">--}}
{{--                                <span class="plus-btn"><i class="bx bx-plus"></i></span>--}}
{{--                            </div>--}}

                            <button type="submit" class="default-btn"><i class="flaticon-trolley"></i> افزودن به سبد خرید</button>
                        </div>

{{--                        <div class="wishlist-btn">--}}
{{--                            <a href="#" class="bookmark_btn">--}}
{{--                                <i class="bx bx-heart" data-id="{{$product->id}}"></i> افزودن به لیست علاقه مندی ها--}}
{{--                            </a>--}}
{{--                        </div>--}}

                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="products-details-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description">توضیحات</a></li>
                            <li class="nav-item"><a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping">حمل نقل</a></li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                {!! $product->product_desc ?? "توضیحاتی ثبت نشده!" !!}
                            </div>

                            <div class="tab-pane fade" id="shipping" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>حمل نقل</td>
                                            <td>ارسال در کوتاه ترین زمان</td>
                                        </tr>

                                        <tr>
                                            <td>تحویل</td>
                                            <td>
                                                تمام تلاس ما کسب رضایت شماست.<br>لذا تمام تلاش خود را برای ارسال در همان روز خواهیم کرد.
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="related-products">
            @if(isset($popularproduct) && isset($popularproduct[0]))
                @include('partials.most_visited')
            @endif
        </div>
    </section>
    <!-- End Product Details Area -->




    @endif
@endsection

@section('extra_js')

@endsection
