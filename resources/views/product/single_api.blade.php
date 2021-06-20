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
                                وب سرویس ویژه
                            </div>
                        </div>
                        <div class="product-gallery">
                            <span class="badge">پر فروش</span>
                            <div class="product-carousel owl-carousel">
                                <div class="item">
                                    <a class="gallery-item" href="/uploads/thumbnail/{{$product->thumbnail}}"
                                        data-fancybox="gallery1" data-hash="one">
                                        <img class="img-fluid" src="/uploads/thumbnail/{{$product->thumbnail ?? 'noimage_500.jpg'}}" alt="{{$product->product_name}}" style="width: 350px;">
                                    </a>
                                </div>
                            </div>
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
                                        <span><a href="{{route('category', $product->category->name)}}">{{$product->category->name ?? "سی و سه"}}</a></span>
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
                                    @if(isset($product->free_request) && strlen($product->free_request) > 0)
                                        <li>
                                            <span>تعداد درخواست رایگان: </span>
                                            <span> {{$product->free_request ?? ""}} عدد </span>
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
                                        دریافت آنلاین توکن
                                    </a>
                                </div>
                            @elseif($product->price == 0)
                                <div class="dt-sl mt-4">
                                    <a id="freeDownload" href="{{route('download', ['filename' => $product->file])}}" class="btn-primary-cm btn-with-icon">
                                        <img src="/img/theme/shopping-cart.png" alt="cart-icon">
                                        استفاده از {{$product->free_request}} درخواست رایگان در ماه
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

            <div class="mb-5 px-0 dt-sl pt-0">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 px-0">
                        <div class="card card-code-container">
                            <div class="card-header code-card">
                                <ul class="nav">
                                    <li class="mt-4 mt-md-0 mt-lg-0"><a class="active" data-toggle="tab" href="#home">Result Sample</a></li>
                                    <li class="mt-4 mt-md-0 mt-lg-0"><a data-toggle="tab" href="#menu1">(PHP)cURL</a></li>
                                    <li class="mt-4 mt-md-0 mt-lg-0"><a data-toggle="tab" href="#menu2">(Node.js)Unirest</a></li>
                                    <li class="mt-4 mt-md-0 mt-lg-0"><a data-toggle="tab" href="#menu3">(JavaScript)JQuery</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        <h3>Result Sample</h3>
                                        <pre><code>{!! $product->result_sample !!}</code></pre>
                                    </div>
                                    <div id="menu1" class="tab-pane fade text-left">
                                        <h3>(PHP)cURL</h3>
                                        <pre><code>{!! $product->php_language !!}</code></pre>
                                    </div>
                                    <div id="menu2" class="tab-pane fade text-left">
                                        <h3>(Node.js)Unirest</h3>
                                        <pre><code>{!! $product->nodejs_language !!}</code></pre>
                                    </div>
                                    <div id="menu3" class="tab-pane fade text-left">
                                        <h3>(JavaScript)JQuery</h3>
                                        <pre><code>{!! $product->js_language !!}</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($product))
                        <div class="col-12 col-md-6 col-lg-6 px-0">
                            <div class="card card-code-container">
                                <div class="card-header text-center">
                                    {{$product->product_name}}
                                </div>
                                <div class="card-body p-0 m-0">
                                    <div class="w-100" id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        About Api
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show text-left" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 col-lg-4 text-right domain-details">
                                                            @if (\Illuminate\Support\Facades\Auth::user()->profile->domain !== null && \Illuminate\Support\Str::length(\Illuminate\Support\Facades\Auth::user()->profile->doman) > 0)
                                                                <img class="img-fluid" src="/img/icon/download.png">
                                                                <p>درباره وب سرویس</p>
                                                                <a class="text-success" href="javascript:void(0)">{{\Illuminate\Support\Facades\Auth::user()->profile->domain}}</a>
                                                                <p class="text-warning pointer-event">تغییر دامنه</p>
                                                            @else
                                                                <img class="img-fluid" src="/img/icon/download.png">
                                                                <p>درباره وب سرویس</p>
                                                                <a class="text-success" href="#">برای ثبت دامنه خود کلیک کنید</a>
                                                                <p class="font-weight-lighter mt-2"><b class="text-danger">نکته :</b> برای استفاده از وب سرویس های رایگان نیازی به ثبت دامنه نیست</p>
                                                            @endif
                                                        </div>
                                                        <div class="col-12 col-md-8 col-lg-8 mt-3 text-right product-description">
                                                            <p class="text-justify">{{$product->product_desc}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Header Parameters
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <img class="img-fluid mt-4" src="/img/icon/reqired-parameters.png">
                                                    <p>پارامترهای ارسالی در هدر</p>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-6 text-left">
                                                            <lable class="font-12 text-muted">C-CioCeAPI-Key</lable>
                                                            @if (\Illuminate\Support\Facades\Auth::user()->token !== null && \Illuminate\Support\Str::length(\Illuminate\Support\Facades\Auth::user()->token) > 0)
                                                                <input class="form-control text-left font-10" readonly type="text" value="{{\Illuminate\Support\Facades\Auth::user()->token}}" name="token">
                                                                <span class="text-muted font-11">REQUIRED</span>
                                                            @else
                                                                <input class="form-control text-left font-10" readonly type="text" value="Click Here To Get First Token" name="token">
                                                                <span class="text-muted font-11">REQUIRED</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6 text-left">
                                                            <lable class="font-12 text-muted">C-CioCeAPI-Host</lable>
                                                            <input class="form-control text-left font-10" readonly type="text" value="/api/weather/api-name" name="token">
                                                            <span class="text-muted font-11">REQUIRED</span>
                                                        </div>
                                                    </div>
                                                    <p class="mt-5 font-11"><b class="text-danger">نکته : </b>برای دریافت توکن، هاست کد مربوطه و یا معرفی نام دامنه خود، به صفحه کاربری، قسمت <a href="#">تنظیمات API</a> بروید.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Required Parameters
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <img class="img-fluid mt-4" src="/img/icon/download-(9).png">
                                                    <p>پارامترهای ارسالی</p>
                                                    <p>{{$product->parameters}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{--About Web service and Comments--}}
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
            {{--About Web service and Comments--}}


            <!-- Start Product-Slider -->
            @include('partials.popular_products')
            <!-- End Product-Slider -->

        </div>
    </main>
    <!-- End main-content -->
    @endif
@endsection

@section('extra_js')
    <script>
        $(document).ready(function(){
            $("#home").tab('active');
        });
    </script>
@endsection
