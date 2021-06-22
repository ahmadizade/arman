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
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start Profile-order-step-Slider -->
            <div class="col-12">
                <div class="profile-order-steps carousel-lg owl-carousel owl-theme">
                    <div class="item profile-order-steps-item is-active">
                        <img src="/img/svg/d5d5e1d2.svg">
                        <span>تایید سفارش</span>
                    </div>
                    <div class="item profile-order-steps-item is-active">
                        <img src="/img/svg/0eab59b0.svg">
                        <span>لغو شده</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/3db3cdeb.svg">
                        <span>آماده‌سازی سفارش</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/332b9ff1.svg">
                        <span>خروج از مرکز پردازش</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/07a0808a.svg">
                        <span>تحویل به پست</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/dbab74ce.svg">
                        <span>مرکز مبادلات پست</span>
                    </div>
                    <div class="item profile-order-steps-item">
                        <img src="/img/svg/50450a73.svg">
                        <span>تحویل به مشتری</span>
                    </div>
                </div>
            </div>
            <!-- End Profile-order-step-Slider -->


            <!-- Start Price Lists -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div
                            class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                            <h2>نرخ بر اساس تعداد</h2>
                        </div>
                        <div class="dt-sl">
                            <div class="table-responsive">
                                <table class="table table-order">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>پکیج ها</th>
                                        <th>درخواست رایگان</th>
                                        <th>درخواست پولی 1 ماهه</th>
                                        <th>درخواست پولی 3 ماهه</th>
{{--                                        <th>مبلغ کل</th>--}}
                                        <th>عملیات پرداخت</th>
                                        <th>جزییات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>CIO-Basic</td>
                                        <td>{{$product->free_request}} عدد در ماه</td>
                                        <td><img class="img-fluid" src="/img/icon/multiplit.png"></td>
                                        <td><img class="img-fluid" src="/img/icon/multiplit.png"></td>
{{--                                        <td>رایگان</td>--}}
                                        <td>ندارد</td>
                                        <td class="details-link">
                                            <a href="#">
                                                <i class="mdi mdi-chevron-left"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pro</td>
                                        <td>{{$product->free_request}} عدد در ماه</td>
                                        <td>
                                            <p class="m-0 p-0 font-weight-bold">{{number_format($product->pro_price)}} تومان</p>
                                            <p class="m-0 p-0 text-muted">{{$product->pro_request_1_month}} عدد</p>

                                        </td>
                                        <td>
                                            <p class="m-0 p-0 font-weight-bold">{{number_format($product->pro_price * 3)}} تومان</p>
                                            <p class="m-0 p-0 text-muted">{{$product->pro_request_3_month}} عدد</p>

                                        </td>
{{--                                        <td>۱۸,۰۴۹,۰۰۰ تومان</td>--}}
                                        <td>دارد</td>
                                        <td class="details-link">
                                            <a href="#">
                                                <i class="mdi mdi-chevron-left"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Ultra</td>
                                        <td>{{$product->free_request}} عدد در ماه</td>
                                        <td>
                                            <p class="m-0 p-0 font-weight-bold">{{number_format($product->ultra_price)}} تومان</p>
                                            <p class="m-0 p-0 text-muted">{{$product->ultra_request_1_month}} عدد</p>

                                        </td>
                                        <td>
                                            <p class="m-0 p-0 font-weight-bold">{{number_format($product->ultra_price * 3)}} تومان</p>
                                            <p class="m-0 p-0 text-muted">{{$product->ultra_request_3_month}} عدد</p>

                                        </td>
                                        {{--                                        <td>۱۸,۰۴۹,۰۰۰ تومان</td>--}}
                                        <td>دارد</td>
                                        <td class="details-link">
                                            <a href="#">
                                                <i class="mdi mdi-chevron-left"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mega</td>
                                        <td>{{$product->free_request}} عدد در ماه</td>
                                        <td>
                                            <p class="m-0 p-0 font-weight-bold">{{number_format($product->mega_price)}} تومان</p>
                                            <p class="m-0 p-0 text-muted">{{$product->mega_request_1_month}} عدد</p>

                                        </td>
                                        <td>
                                            <p class="m-0 p-0 font-weight-bold">{{number_format($product->mega_price * 3)}} تومان</p>
                                            <p class="m-0 p-0 text-muted">{{$product->mega_request_3_month}} عدد</p>

                                        </td>
                                        {{--                                        <td>۱۸,۰۴۹,۰۰۰ تومان</td>--}}
                                        <td>دارد</td>
                                        <td class="details-link">
                                            <a href="#">
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

        </div>
    </main>
    <!-- End main-content -->

@endsection

@section('extra_js')

@endsection
