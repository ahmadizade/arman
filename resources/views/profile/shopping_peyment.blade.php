@extends("layouts.master")

@section("title")
<title>CioCe.ir | سبد خرید</title>
@endsection

@section('extra_css')
    <link rel="stylesheet" href="/css/vendor/nouislider.min.css">
@endsection

@section("content")


        <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">
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

                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                                        <section class="page-content dt-sl">
                                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                                <h2>انتخاب شیوه پرداخت</h2>
                                            </div>
                                            <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3 mb-4">
                                                <div class="checkout-pack">
                                                    <div class="row">
                                                        <div class="checkout-time-table checkout-time-table-time">
                                                            <div class="col-12">
                                                                <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                                                    <input type="radio" class="custom-control-input" name="post-pishtaz"
                                                                           id="1" value="1" checked>
                                                                    <label for="1" class="custom-control-label">
                                                                        <i class="mdi mdi-credit-card-outline checkout-additional-options-checkbox-image"></i>
                                                                        <div class="content-box">
                                                                            <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                                                پرداخت اینترنتی و درگاه بانک
                                                                                <span class="help-sn" data-toggle="tooltip"
                                                                                      data-html="true" data-placement="bottom"
                                                                                      title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'> در صورت پرداخت ناموفق هزینه کسر شده حداکثر طی ۷۲ ساعت به حساب شما بازگردانده می‌شود.</p></div>">
                                                                    <span class="mdi mdi-information-outline"></span>
                                                                </span>
                                                                            </div>
                                                                            <ul class="checkout-time-table-subtitle-bar">
                                                                                <li>
                                                                                    پرداخت با تمامی کارت‌های بانکی
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                                                    <input disabled type="radio" class="custom-control-input" name="post-pishtaz"
                                                                           id="2" value="2">
                                                                    <label disabled for="2" class="custom-control-label">
                                                                        <i
                                                                            class="mdi mdi-credit-card-multiple-outline checkout-additional-options-checkbox-image text-muted"></i>
                                                                        <div class="content-box">
                                                                            <div
                                                                                class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                                                کسر از اعتبار من ( CIoPay )
                                                                            </div>
                                                                            <ul class="checkout-time-table-subtitle-bar">
                                                                                <li>
                                                                                    شرکت در قرعه کشی بزرگ سیوپی
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @if (\Illuminate\Support\Facades\Session::has('product')  && count(\Illuminate\Support\Facades\Session::get('product')))
                                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                                <h2>خلاصه سفارش</h2>
                                            </div>
                                            <div class="dt-sn dt-sn--box pt-3 pb-3">
                                        <div class="checkout-order-summary">
                                            <div class="accordion checkout-order-summary-item" id="accordionExample">
                                                <div class="card pt-sl-res">
                                                    <div class="card-header checkout-order-summary-header" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                                    data-target="#collapseOne" aria-expanded="false"
                                                                    aria-controls="collapseOne">
                                                                <div class="checkout-order-summary-row">
                                                                    <div class="checkout-order-summary-col checkout-order-summary-col-post-time">
                                                                        تعداد مرسوله
                                                                        <span class="fs-sm">({{count(\Illuminate\Support\Facades\Session::get('product'))}} کالا)</span>
                                                                    </div>

                                                                    <div class="checkout-order-summary-col checkout-order-summary-col-how-to-send">
                                                                        <span class="dl-none-sm">نحوه ارسال</span>
                                                                        <span class="dl-none-sm">                                                                    ایجاد لینک دانلود پس از پرداخت
                                                        </span>
                                                                    </div>
                                                                    <div
                                                                        class="checkout-order-summary-col checkout-order-summary-col-how-to-send">
                                                                        <span>ارسال از</span>
                                                                        <span class="fs-sm">
                                                            سرور اصلی سیوسه
                                                        </span>
                                                                    </div>
                                                                    <div
                                                                        class="checkout-order-summary-col checkout-order-summary-col-shipping-cost">
                                                                        <span>هزینه راه اندازی</span>
                                                                        <span class="fs-sm">
                                                            فقط سایت آماده
                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <i class="mdi mdi-chevron-down icon-down"></i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    @if (\Illuminate\Support\Facades\Session::has('product') && count(\Illuminate\Support\Facades\Session::get('product')))
                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                             data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="box">
                                                                    <div class="row">
                                                                        @foreach (\Illuminate\Support\Facades\Session::get('product') as $item)
                                                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                                                <div class="product-box-container">
                                                                                    <div class="product-box product-box-compact">
                                                                                        <a class="product-box-img">
                                                                                            <img src="/uploads/thumbnail/{{$item->thumbnail}}">
                                                                                        </a>
                                                                                        <div class="product-box-title">
                                                                                            {{$item->product_name}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @endif

                                            <div class="row mt-4">
                                                <div class="col-sm-6 col-12">
                                                    <div class="dt-sn dt-sn--box pt-3 pb-3 px-res-1">
                                                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                                            <h2>استفاده از کارت هدیه سیوسه
                                                                <span class="help-sn" data-toggle="tooltip" data-html="true"
                                                                      data-placement="bottom"
                                                                      title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>با استفاده از کد کارت هدیه، تمام یا بخشی از مبلغ سفارش توسط کارت هدیه پرداخت می‌شود.
                                                        در صورت باقی ماندن بخشی از مبلغ کارت هدیه، امکان استفاده از باقی مانده مبلغ برای خریدهای بعدی امکان‌پذیر است.</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span>
                                                            </h2>
                                                        </div>
                                                        <p>با ثبت کد کارت هدیه، مبلغ کارت هدیه از “مبلغ قابل پرداخت” کسر می‌شود.</p>
                                                        <div class="form-ui">
                                                            <form action="">
                                                                <div class="row text-center">
                                                                    <div class="col-xl-8 col-lg-12 px-0">
                                                                        <div class="form-row">
                                                                            <input type="text" class="input-ui pr-2"
                                                                                   placeholder="مثلا 1234ABCD5678EFGH0123">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-12 px-0">
                                                                        <button class="btn btn-primary mt-res-1">ثبت کد هدیه</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="dt-sn dt-sn--box pt-3 pb-3 px-res-1">
                                                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                                            <h2>استفاده از کد تخفیف سیوسه
                                                                <span class="help-sn" data-toggle="tooltip" data-html="true"
                                                                      data-placement="bottom"
                                                                      title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>بعد از نهایی شدن سفارش کد تخفیف را ثبت نمایید. بعد از ثبت کد تخفیف امکان بازگشت و یا تغییر سبد وجود نخواهد داشت. در صورت تغییر سفارش، کد تخفیف از بین خواهد رفت و امکان اعمال مجدد آن وجود ندارد</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span>
                                                            </h2>
                                                        </div>
                                                        <p>با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می‌شود.</p>
                                                        <div class="form-ui">
                                                            <form action="">
                                                                <div class="row text-center">
                                                                    <div class="col-xl-8 col-lg-12 px-0">
                                                                        <div class="form-row">
                                                                            <input type="text" class="input-ui pr-2"
                                                                                   placeholder="مثلا 837A2CS">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-12 px-0">
                                                                        <button class="btn btn-primary mt-res-1">ثبت کد تخفیف</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <a href="{{route('cart_page')}}" class="float-right border-bottom-dt"><i
                                                        class="mdi mdi-chevron-double-right"></i>بازگشت به سبد خرید</a>
                                                <a href="#" class="float-left border-bottom-dt">ثبت نهایی سفارش<i
                                                        class="mdi mdi-chevron-double-left"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                    @if(Illuminate\Support\Facades\Session::has('shipping') && !empty(Illuminate\Support\Facades\Session::get('shipping')))
                                        <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                                        <div class="dt-sn dt-sn--box mb-2">
                                            <ul class="checkout-summary-summary">
                                                <li>
                                                    <span>مبلغ کل ({{count(\Illuminate\Support\Facades\Session::get('product'))}} کالا)</span><span>{{number_format(\Illuminate\Support\Facades\Session::get('shipping')['last_price'] + \Illuminate\Support\Facades\Session::get('shipping')['total_discount'])}} تومان</span>
                                                </li>
                                                <li class="checkout-summary-discount">
                                                    <span>سود شما از خرید</span><span class="red-price">{{number_format(\Illuminate\Support\Facades\Session::get('shipping')['total_discount'])}} تومان</span>
                                                </li>
                                                <li>
                                                <span>هزینه نصب<span class="help-sn" data-toggle="tooltip"
                                                                     data-html="true" data-placement="bottom"
                                                                     title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه نصب : <br>این مبلغ فقط در خرید وب سایت آماده محاسبه خواهد شد</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></span><span>وابسته به کالا</span>
                                                </li>
                                                <li class="checkout-club-container">
                                    <span>سیوکلاب<span class="help-sn" data-toggle="tooltip" data-html="true"
                                                        data-placement="bottom"
                                                        title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>با امتیازهای خود در باشگاه مشتریان سیوسه (سیو کلاب) از بین جوایز متنوع انتخاب کنید.</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span></span><span><span>۱۵۰+</span><span> امتیاز</span></span>
                                                </li>
                                            </ul>
                                            <div class="checkout-summary-devider">
                                                <div></div>
                                            </div>

                                            <div class="checkout-summary-content">
                                                <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                                <div class="checkout-summary-price-value">
                                                    <span class="checkout-summary-price-value-amount">{{number_format(\Illuminate\Support\Facades\Session::get('shipping')['last_price'])}}</span>
                                                    تومان
                                                </div>
                                                <a id="before_buying" class="mb-2 d-block">
                                                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                                        <i class="mdi mdi-arrow-left"></i>
                                                        پرداخت و ثبت نهایی سفارش
                                                    </button>
                                                </a>
                                                <div>
                                    <span>
                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                        مراحل بعدی را تکمیل کنید.
                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                 data-placement="bottom"
                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، سیوسه هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                        <span class="mdi mdi-information-outline"></span>
                                    </span></div>
                                            </div>
                                        </div>
                                        <div class="dt-sn dt-sn--box checkout-feature-aside pt-4">
                                            <ul>
                                                <li class="checkout-feature-aside-item">
                                                    <img src="/img/svg/return-policy.svg" alt="">
                                                    پشتیبانی 7 روز هفته
                                                </li>
                                                <li class="checkout-feature-aside-item">
                                                    <img src="/img/svg/payment-terms.svg" alt="">
                                                    پرداخت با تمام بانک های شتاب
                                                </li>
                                                <li class="checkout-feature-aside-item">
                                                    <img src="/img/svg/delivery.svg" alt="">
                                                    تحویل و ایجاد لینک آنلاین
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End main-content -->
@endsection
@section('extra_js')
    <script src="/js/vendor/nouislider.min.js"></script>
    <script src="/js/vendor/wNumb.js"></script>
    <script src="/js/vendor/ResizeSensor.min.js"></script>
    <script>
        $('#before_buying').click(function () {
            $.ajax({
                url : '{{route('before_buying')}}',
                type : "get",
                @if(Illuminate\Support\Facades\Session::has('product') && !empty(Illuminate\Support\Facades\Session::get('product')))
                    data : {'id' : '{{json_encode(\Illuminate\Support\Facades\Session::get('shipping')['id'])}}' },
                @endif
                success : function (data) {
                    console.log(data);
                    if (data.status == "0") {
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'error',
                            title : "Support-Team",
                            text: data.desc,
                            footer : '<a href="{{route('login')}}" class="mt-2 text-success">ورود به سایت</a>',
                            showConfirmButton: false,
                            timer: 8000
                        });
                    }
                    if (data.status == "1") {
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                }
            });
        })
    </script>
@endsection
