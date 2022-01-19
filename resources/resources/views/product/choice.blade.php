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
    <!-- Start main-content -->
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
                    <div class="item profile-order-steps-item is-active">
                        <img src="/img/svg/dbab74ce.svg">
                        <span>بررسی اطلاعات</span>
                    </div>
                    <div class="item profile-order-steps-item is-active">
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

            @if(isset($product) && \Illuminate\Support\Facades\Auth::check())
            <!-- Start Price Lists -->
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-4 mb-4">
                        <div
                            class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                            <h2>{{$product->product_name}} ({{$package}})</h2>
                        </div>
                        <div class="dt-sl">
                            <div class="table-responsive">
                                <form id="process" action="{{ route("choice",["id" => $product->id,"type" => $package]) }}" method="get">
                                    <table class="table table-order">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>پکیج</th>
                                        <th>درخواست رایگان</th>
                                        <th>پکیج 1 ماهه</th>
                                        <th>پکیج 3 ماهه</th>
{{--                                        <th>مبلغ کل</th>--}}
                                        <th>عملیات پرداخت</th>
                                        @if($package == "basic")
                                            <th>TOKEN</th>
                                        @else
                                            <th>پرداخت</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$package}}</td>
                                        <td>{{$product->free_request}} عدد در ماه</td>
                                        <td>
                                            @if($package == "basic")
                                                <p class="m-0 pt-1 text-muted">رایگان</p>
                                                <input type="radio" id="customRadio" name="month" value="0" class="custom-control-input" checked>
                                            @else
                                                <p class="m-0 pt-1 text-muted">{{number_format($price)}} تومان</p>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="month" value="1" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="customRadio1"></label>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($package == "basic")
                                                <p class="m-0 pt-1 text-muted">غیر فعال</p>
                                            @else
                                                <p class="m-0 pt-1 text-muted">{{number_format($price * 3)}} تومان</p>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="month" value="3" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2"></label>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($package == "basic")
                                                <img class="img-fluid" src="/img/icon/multiplit.png">
                                            @else
                                                <img class="img-fluid" src="/img/icon/tick-green.png">
                                            @endif
                                        </td>
                                        <td class="details-link">
                                            <a href="#" onclick="document.getElementById('process').submit()">
                                                <i class="mdi mdi-chevron-left"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Price Lists -->
            @elseif(!\Illuminate\Support\Facades\Auth::check())
            <!-- Start Price Lists -->
            <div class="container">
                    <div class="row">
                        <div class="col-12 mt-4 mb-4">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>{{$product->product_name}} ({{$package}})</h2>
                            </div>
                            <div class="dt-sl">
                                <div class="table-responsive">
                                    <table class="table table-order">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>پکیج</th>
                                            <th>درخواست رایگان</th>
                                            <th>پکیج 1 ماهه</th>
                                            <th>پکیج 3 ماهه</th>
                                            <th>عملیات پرداخت</th>
                                            <th>پرداخت</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{$package}}</td>
                                            <td>ابتدا ثبت نام کنید</td>
                                            <td class="text-center">
                                                <p class="m-0 pt-1 text-muted">---</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="m-0 pt-1 text-muted">---</p>
                                            </td>
                                            <td>Sign in First</td>
                                            <td class="details-link">
                                                <a id="choice" href="javascript:void(0)">
                                                    <i class="mdi mdi-chevron-left"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Price Lists -->
            @endif
            <div class="container">
                @include('partials.condition')
            </div>
            <!-- Domain ACCEPT -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div
                            class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                            <h2>افزودن و ویرایش دامنه</h2>
                        </div>
                        <div class="form-ui additional-info dt-sl dt-sn pt-4">
                            <form action="{{ route("add_domain") }}" method="post">
                                @if(\Illuminate\Support\Facades\Auth::user()->domain !== null )
                                    <p class="font-13 pb-3"><b class="text-success">دامنه </b> شما : {{\Illuminate\Support\Facades\Auth::user()->domain}}</p>
                                @else
                                    <p class="font-13 pb-3"><b class="text-danger">اخطار : </b><u>{{\Illuminate\Support\Facades\Auth::user()->name}}</u> عزیز، شما همچنان دامنه خود را ثبت نکرده اید.</p>
                                @endif
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                                        <div class="pt-2 pb-2 mb-3 dt-sl">
                                            <div class="form-row-title mb-2">
                                                <h3>آدرس دامنه</h3>
                                            </div>
                                            <div class="form-row">
                                                <input readonly type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                <input name="domain" type="text" class="input-ui text-left dir-ltr p-3"
                                                       placeholder="www.armanmask.ir">
                                                <button type="submit" class="btn btn-success float-left mt-3">ثبت / ویرایش دامنه</button>
                                            </div>
                                        </div>
                                        <b class="text-danger">توجه : </b>برای خرید وب سرویس حتما نیاز به ثبت دامنه وب سایت شما می باشد، چرا که وب سرویس فقط به <b class="text-success">دامنه </b> که شما ثبت کرده اید پاسخ می دهد.</p>
                                        <p>در استفاده از وب سرویس های <b class="text-danger">رایگان </b> نیازی به ثبت دامنه وجود ندارد و بدون ثبت دامنه هم می توانید توکن مربوطه را دریافت کنید.</p>

                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                                        <div class="pt-2 pb-2 mb-3 dt-sl text-center text-md-left text-lg-left">
                                            <img class="img-fluid w-50" src="/img/extra/Internet-Domain.jpg">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Domain ACCEPT -->

        </div>
    </main>
    <!-- End main-content -->

@endsection

@section('extra_js')
    <script>
        $('.body').on('click', $('#choice'),function () {
            alert(2);
        })
    </script>
@endsection
