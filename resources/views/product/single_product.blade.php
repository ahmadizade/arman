@extends("layouts.master")

@section("title")
    @if(\Illuminate\Support\Str::length($product->seo_title) > 1)
        <title>{{ $product->seo_title }} - سی و سه</title>
    @else
        <title>{{ $product->product_name ?? '' }} - سی و سه</title>
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
        <meta property="og:title" content="{{ $product->seo_title }} - سی و سه">
    @else
        <meta property="og:title" content="{{ $product->product_name ?? '' }} - سی و سه">
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
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start Profile-order-step-Slider -->
            <div class="col-12">
                <div class="profile-order-steps carousel-lg owl-carousel owl-theme mt-5">
                    <div class="item profile-order-steps-item is-active">
                        <img src="/img/svg/d5d5e1d2.svg">
                        <span>انتخاب محصول</span>
                    </div>
                    <div class="item profile-order-steps-item is-active">
                        <img src="/img/svg/3db3cdeb.svg">
                        <span>افرودن به سبد خرید</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/dbab74ce.svg">
                        <span>بررسی اطلاعات</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/50450a73.svg">
                        <span>ثبت سفارش</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/0eab59b0.svg">
                        <span>کنترل پشتیبان</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/332b9ff1.svg">
                        <span>تحویل آنلاین</span>
                    </div>
                </div>
            </div>
            <!-- End Profile-order-step-Slider -->

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
            <!-- Start title - breadcrumb -->
            <div class="title-breadcrumb-special dt-sl mb-3">
                <div class="breadcrumb dt-sl">
                    <nav>
                        <a href="#">{{$product->category->name}}</a>
                        <a href="#">{{$product->variety->name}}</a>
                        <a href="#">{{$product->product_name}}</a>
                    </nav>
                </div>
            </div>
            <!-- End title - breadcrumb -->

            <!-- Start Product -->
            <div class="dt-sn mb-5 dt-sl">
                <div class="row">
                    <!-- Product Gallery-->
                    <div class="col-lg-4 col-md-6 ps-relative">
                        <!-- Product Options-->
                        <ul class="gallery-options">
                            <li>
                                <button class="add-favorites"><i class="mdi mdi-heart"></i></button>
                                <span class="tooltip-option">افزودن به علاقمندی</span>
                            </li>
                        </ul>
                        <div class="product-timeout position-relative pt-5 mb-3">
                            <div class="promotion-badge">
                                کالای ویژه
                            </div>
{{--                            <div class="countdown-timer" countdown data-date="10 24 2019 20:20:22">--}}
{{--                                <span data-days>0</span>:--}}
{{--                                <span data-hours>0</span>:--}}
{{--                                <span data-minutes>0</span>:--}}
{{--                                <span data-seconds>0</span>--}}
{{--                            </div>--}}
                        </div>
                        <div class="product-gallery">
                            <span class="badge">پر فروش</span>
                            <div class="product-carousel owl-carousel">
                                <div class="item">
                                    <a class="gallery-item" href="/uploads/products/{{$product->image}}"
                                        data-fancybox="gallery1" data-hash="one">
                                        <img class="img-fluid" src="/uploads/products/{{$product->image ?? 'noimage_500.jpg'}}" alt="{{$product->product_name}}">
                                    </a>
                                </div>
{{--                                <div class="item">--}}
{{--                                    <a class="gallery-item" href="/img/single-product/thumbnail-2.jpg"--}}
{{--                                        data-fancybox="gallery1" data-hash="two">--}}
{{--                                        <img src="/img/single-product/thumbnail-2.jpg" alt="Product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="item">--}}
{{--                                    <a class="gallery-item" href="/img/single-product/thumbnail-3.jpg"--}}
{{--                                        data-fancybox="gallery1" data-hash="three">--}}
{{--                                        <img src="/img/single-product/thumbnail-3.jpg" alt="Product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="item">--}}
{{--                                    <a class="gallery-item" href="/img/single-product/thumbnail-4.jpg"--}}
{{--                                        data-fancybox="gallery1" data-hash="four">--}}
{{--                                        <img src="/img/single-product/thumbnail-4.jpg" alt="Product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                            </div>
{{--                            <ul class="product-thumbnails">--}}
{{--                                <li class="active">--}}
{{--                                    <a href="#one">--}}
{{--                                        <img src="/img/single-product/thumbnail-1.jpg" alt="Product">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#two">--}}
{{--                                        <img src="/img/single-product/thumbnail-2.jpg" alt="Product">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#three">--}}
{{--                                        <img src="/img/single-product/thumbnail-3.jpg" alt="Product">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#four">--}}
{{--                                        <img src="/img/single-product/thumbnail-4.jpg" alt="Product">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="navi-link text-sm" href="/video/download.mp4" data-fancybox--}}
{{--                                        data-width="960" data-height="640">--}}
{{--                                        <i class="mdi mdi-video text-lg d-block mb-1"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="col-lg-8 col-md-6 py-2">
                        <div class="product-info dt-sl">
                            <div class="product-title dt-sl">
                                <h1>{{$product->product_name ?? ""}}</h1>
                                <h2>{{$product->english_name ?? ""}}</h2>
                            </div>
                            <div class="product-variant dt-sl">
                                <div class="dt-sl mb-0">
                                    <p>
                                        <span>دسته بندی : </span>
                                        <span><a href="{{route('category',["slug" => $product->category->slug])}}">{{$product->category->name ?? "سی و سه"}}</a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="product-params dt-sl">
                                <ul data-title="ویژگی‌های محصول">
                                    @if(isset($product->framework) && strlen($product->framework) > 0)
                                        <li>
                                            <span>فریم ورک: </span>
                                            <span> {{$product->framework ?? ""}} </span>
                                        </li>
                                    @endif
                                    @if(isset($product->framework_version) && strlen($product->framework_version) > 0)
                                        <li>
                                            <span>ورژن فریم ورک: </span>
                                            <span> {{$product->framework_version ?? ""}}</span>
                                        </li>
                                    @endif
                                    @if(isset($product->data_usage) && strlen($product->data_usage) > 0)
                                        <li>
                                            <span>حجم فایل: </span>
                                            <span> {{$product->data_usage ?? ""}} </span>
                                        </li>
                                    @endif
                                    @if(isset($product->admin_pannel) && strlen($product->admin_pannel) > 0)
                                        <li>
                                            <span>پنل ادمین: </span>
                                            <span> {{\App\Models\Product::status($product->admin_pannel) ?? ""}} </span>
                                        </li>
                                    @endif
                                    @if(isset($product->special_features) && strlen($product->special_features) > 0)
                                        <li>
                                            <span>ویژگی‌های خاص: </span>
                                            <span>{!! $product->special_features ?? "" !!}</span>
                                        </li>
                                    @endif
                                </ul>
                                <div class="sum-more">
                                    <span class="show-more btn-link-border">
                                        + موارد بیشتر
                                    </span>
                                    <span class="show-less btn-link-border">
                                        - بستن
                                    </span>
                                </div>
                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>کد محصول:{{$product->id}}</h2>
                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>قیمت : <span class="price">
                                        @if ($product->price > 0)
                                            {{number_format($product->price)}} تومان
                                        @elseif ($product->price == 0)
                                            <span class="text-danger" style="font-size: 20px">رایگان</span>
                                        @endif

                                    </span> </h2>
                            </div>
                            @if ($product->price > 0)
                                <div class="dt-sl mt-4">
                                    <a href="{{route('card', ['id' => $product->id])}}" class="btn-primary-cm btn-with-icon">
                                        <img src="/img/theme/shopping-cart.png" alt="cart-icon">
                                        افزودن به سبد خرید
                                    </a>
                                </div>
                            @elseif($product->price == 0)
                                <div class="dt-sl mt-4">
                                    <a id="freeDownload" href="{{route('download', ['filename' => $product->file])}}" class="btn-primary-cm btn-with-icon">
                                        <img src="/img/theme/shopping-cart.png" alt="cart-icon">
                                        دانلود رایگان محصول
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-add-to-cart-btn-wrapper">
                    <a href="#" class="mb-add-to-cart-btn">افزودن به سبد خرید</a>
                </div>
            </div>
            <div class="dt-sn mb-5 px-0 dt-sl pt-0">
                <!-- Start tabs -->
                <section class="tabs-product-info mb-3 dt-sl">
                    <div class="ah-tab-wrapper dt-sl">
                        <div class="ah-tab dt-sl">
                            <a class="ah-tab-item" data-ah-tab-active="true" href=""><i
                                    class="mdi mdi-glasses"></i>نقد و بررسی</a>
                            <a class="ah-tab-item" href=""><i class="mdi mdi-format-list-checks"></i>مشخصات</a>
                            <a class="ah-tab-item" href=""><i
                                    class="mdi mdi-comment-text-multiple-outline"></i>نظرات کاربران</a>
                        </div>
                    </div>
                    <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>نقد و بررسی</h2>
                            </div>
                            <div class="product-title dt-sl">
                                <h3>{{$product->product_name ?? ""}}</h3>
                                <h3>{{$product->english_name ?? ""}}</h3>
                            </div>
                            <div class="description-product dt-sl mt-3 mb-3">
                                <div class="container">
                                    <p>{!! $product->product_desc ?? "توضیحاتی برای این محصول ثبت نشده است" !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content params dt-sl">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>مشخصات فنی</h2>
                            </div>
                            <div class="product-title dt-sl mb-3">
                                <h3>{{$product->product_name ?? ""}}</h3>
                                <h3>{{$product->english_name ?? ""}}</h3>
                            </div>
                            <section>
                                <h3 class="params-title">مشخصات کلی</h3>
                                <ul class="params-list">
                                    @if(isset($product->framework) && strlen($product->framework) > 0)
                                        <li>
                                            <div class="params-list-key">
                                                <span class="d-block">فریم ورک</span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="d-block">
                                                    {{$product->framework ?? "ثبت نشده"}}
                                                </span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="d-block">
                                                    {{$product->framework_version ?? "ثبت نشده"}}
                                                </span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="d-block">
                                                    {{$product->data_usage ?? "ثبت نشده"}}
                                                </span>
                                            </div>
                                        </li>
                                    @endif
                                    @if(isset($product->framework_details) && strlen($product->framework_details) > 0)
                                        <li>
                                            <div class="params-list-key">
                                                <span class="d-block">توضیحات فریم ورک</span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="d-block">
                                                    {!! $product->framework_details ?? "ثبت نشده" !!}
                                                </span>
                                            </div>
                                        </li>
                                    @endif
                                    @if(isset($product->framework_frontend_details) && strlen($product->framework_frontend_details) > 0)
                                        <li>
                                            <div class="params-list-key">
                                                <span class="d-block">فریم ورک و ابزار فرانت _ اند</span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="d-block">
                                                    {!! $product->framework_frontend_details ?? "ثبت نشده" !!}
                                                </span>
                                            </div>
                                        </li>
                                    @endif
                                    @if(isset($product->short_description_of_backend) && strlen($product->short_description_of_backend) > 0)
                                        <li>
                                            <div class="params-list-key">
                                                <span class="d-block">فریم ورک و ابزار بک _ اند</span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="d-block">
                                                    {!! $product->short_description_of_backend ?? "ثبت نشده" !!}
                                                </span>
                                            </div>
                                        </li>
                                    @endif
                                    @if(isset($product->other_plugins) && strlen($product->other_plugins) > 0)
                                        <li>
                                            <div class="params-list-key">
                                                <span class="d-block">دیگر امکانات</span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="d-block">
                                                    {!! $product->other_plugins ?? "ثبت نشده" !!}
                                                </span>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </section>
                            <section>
                                @if(isset($product->other_plugins) && strlen($product->other_plugins) > 0)
                                    <h3 class="params-title">پنل ادمین و سئو</h3>
                                    <ul class="params-list">
                                        <li>
                                            <div class="params-list-key">
                                                <span class="d-block">پنل مدیریت وب سایت</span>
                                            </div>
                                            <div class="params-list-value">
                                                <span class="d-block">
                                                    @if ($product->admin_pannel == 1)
                                                        دارد
                                                    @else
                                                        ندارد
                                                    @endif
                                                </span>
                                            </div>
                                        </li>
                                        @if ($product->admin_pannel == 1)
                                            <li>
                                                <div class="params-list-key">
                                                    <span class="d-block">امکانات پنل ادمین</span>
                                                </div>
                                                <div class="params-list-value">
                                                    <span class="d-block">
                                                        {!! $product->admin_pannel_features ?? "ثبت نشده" !!}
                                                    </span>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </section>
                        </div>
                        <div class="ah-tab-content dt-sl">
                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <h2>پرسش و پاسخ</h2>
                                <p class="count-comment">پرسش خود را در مورد محصول مطرح نمایید</p>
                            </div>
                            <div class="form-question-answer dt-sl mb-3">
                                <form method="POST" action="{{route('comment_action')}}">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    @auth
                                        <input type="hidden" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name ?? ""}}">
                                        <input type="hidden" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email ?? "ایمیلی ثبت نشده"}}">
                                    @endauth

                                    @guest()
                                        <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی">
                                        <input type="email" name="email" class="form-control mt-3" placeholder="رایانامه">
                                    @endguest
                                    <textarea name="desc" class="form-control my-3" rows="5">پیغام خود را اینجا وارد کنید</textarea>
                                    <button type="submit" class="btn btn-dark float-right ml-3">ثبت پرسش</button>
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">اولین پاسخی که به پرسش من داده شد، از طریق ایمیل به من اطلاع دهید.</label>
                                    </div>
                                </form>
                            </div>
                            <div class="comments-area default">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                    <h2>پرسش ها و پاسخ ها</h2>
                                </div>
                                <ol class="comment-list">
                                <!-- #comment-## -->
                                    @if (isset($comments))
                                        @foreach ($comments as $comment)
                                            <li>
                                                <div class="comment-body">
                                                    <div class="comment-author">
                                                        <span class="icon-comment">?</span>
                                                        <cite class="fn">{{$comment->name ?? "ثبت نشده"}}</cite>
{{--                                                        <span class="says">گفت:</span>--}}
                                                        <div class="commentmetadata">
                                                            <a href="javascript:void(0)">
                                                                {{\Morilog\Jalali\Jalalian::forge($comment->created_at)->format("Y/m/d")}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p>{{$comment->desc}}</p>

                                                    <div class="reply"><a class="comment-reply-link" href="javascript:void(0)">پاسخ</a></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                <!-- #comment-## -->
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End tabs -->
            </div>
            <!-- End Product -->

            <!-- Start Product-Slider -->
            @include('partials.popular_products')
            <!-- End Product-Slider -->

        </div>
    </main>
    <!-- End main-content -->
    @endif
@endsection

@section('extra_js')

@endsection
