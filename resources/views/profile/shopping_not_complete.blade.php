@extends("layouts.master")

@section("title")
    <title>armanmask.ir | سبد خرید</title>
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

                <div class="cart-page-content col-12 px-0">
                    <div class="checkout-alert dt-sn dt-sn--box mb-4">
                        <div class="circle-box-icon successful">
                            <i class="mdi mdi-check-bold"></i>
                        </div>
                    @if(isset($order))
                        <div class="checkout-alert-title">
                            <h4> سفارش <span
                                    class="checkout-alert-highlighted checkout-alert-highlighted-success">{{$order->order_number}}</span>
                                ثبت شد اما پرداخت ناموفق بود.
                            </h4>
                        </div>
                        <div class="checkout-alert-content">
                            <p>
                                <span class="checkout-alert-content-failed">برای جلوگیری از لغو سیستمی سفارش، تا ۱
                                    ساعت آینده پرداخت را انجام دهید.</span>
                                <br>
                                <span class="checkout-alert-content-small px-res-1">
                                    چنانچه طی این فرایند مبلغی از حساب شما کسر شده است، طی ۷۲ ساعت آینده به حساب شما
                                    باز خواهد گشت.
                                </span>
                            </p>
                        </div>
                    </div>
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
                                                    <i
                                                        class="mdi mdi-credit-card-outline checkout-additional-options-checkbox-image"></i>
                                                    <div class="content-box">
                                                        <div
                                                            class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                            پرداخت از طریق درگاه بانک
                                                            <span class="help-sn" data-toggle="tooltip"
                                                                  data-html="true" data-placement="bottom"
                                                                  title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>با پرداخت اینترنتی، سفارش شما با اولویت بیشتری نسبت به پرداخت در محل پردازش و ارسال می شود. در صورت پرداخت ناموفق هزینه کسر شده حداکثر طی ۷۲ ساعت به حساب شما بازگردانده می‌شود.</p></div>">
                                                                    <span class="mdi mdi-information-outline"></span>
                                                                </span>
                                                        </div>
                                                        <ul class="checkout-time-table-subtitle-bar">
                                                            <li>
                                                                آنلاین با تمامی کارت‌های بانکی
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
                                                <label for="2" class="custom-control-label">
                                                    <i
                                                        class="mdi mdi-credit-card-multiple-outline text-muted checkout-additional-options-checkbox-image"></i>
                                                    <div class="content-box">
                                                        <div
                                                            class="checkout-time-table-title-bar text-muted checkout-time-table-title-bar-city">
                                                            پرداخت اعتباری آرمان (CioPay)
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-end px-res-1">
                            <div class="col-lg-3 col-md-4 col-sm-5 col-12">
                                <button id="before_buying" class="btn-primary-cm btn-with-icon  w-100">
                                    <i class="mdi mdi-credit-card-outline"></i>
                                    پرداخت سفارش
                                </button>
                            </div>
                        </div>
                    </section>
                    <section class="checkout-details dt-sl dt-sn dt-sn--box mt-4 pt-4 pb-3 pr-3 pl-3 mb-5">
                        <div class="checkout-details-title">
                            <h4 class="checkout-details-title px-res-1">
                                کد سفارش:
                                <span>
                                        {{$order->order_number}}
                                    </span>
                            </h4>
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-12">
                                    <div class="checkout-details-title px-res-1">
                                        <p>
                                            سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                                            <span class="text-highlight text-highlight-error">در انتظار
                                                    پرداخت</span>
                                            است.
                                            جزئیات این سفارش را می‌توانید با کلیک بر روی دکمه
                                            <a href="{{route('order_details',['order_id' => $order->id])}}" class="border-bottom-dt">پیگیری سفارش</a>
                                            مشاهده نمایید.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 px-res-1">
                                    <a href="{{route('order_details',['order_id' => $order->id])}}"
                                       class="btn-primary-cm bg-secondary btn-with-icon d-block text-center pr-0">
                                        <i class="mdi mdi-shopping"></i>
                                        پیگیری سفارش
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="checkout-table">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    نام تحویل گیرنده:
                                                    <span>
                                                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                                                        </span></p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    شماره تماس :
                                                    <span>
                                                            {{\Illuminate\Support\Facades\Auth::user()->mobile}}
                                                        </span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    هزینه نصب :
                                                    <span>
                                                            ندارد
                                                        </span></p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    مبلغ کل:
                                                    <span>
                                                            {{number_format($order->price_with_taxation)}} تومان
                                                        </span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    روش پرداخت:
                                                    <span>
                                                            پرداخت اینترنتی
                                                            <span class="red">
                                                                (ناموفق)
                                                            </span></span></p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    وضعیت سفارش:
                                                    <span>
                                                            در انتظار پرداخت
                                                        </span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>تاریخ ثبت : {{\Morilog\Jalali\Jalalian::forge($order->created_at)->format("Y/m/d") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl px-res-1">
                        <h2>جزئیات پرداخت</h2>
                    </div>
                    <section class="checkout-details dt-sl dt-sn dt-sn--box mb-4 pt-2 pb-3 pl-3 pr-3">
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="checkout-orders-table">
                                        <tr>
                                            <td class="numrow">
                                                <p>
                                                    ردیف
                                                </p>
                                            </td>
                                            <td class="gateway">
                                                <p>
                                                    درگاه
                                                </p>
                                            </td>
                                            <td class="id">
                                                <p>
                                                    شماره پیگیری
                                                </p>
                                            </td>
                                            <td class="date">
                                                <p>
                                                    تاریخ
                                                </p>
                                            </td>
                                            <td class="price">
                                                <p>
                                                    مبلغ
                                                </p>
                                            </td>
                                            <td class="status">
                                                <p>
                                                    وضعیت
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="numrow">
                                                <p>۱</p>
                                            </td>
                                            <td class="gateway">
                                                <p>بانک</p>
                                            </td>
                                            <td class="id">
                                                <p>{{$order->order_number}}</p>
                                            </td>
                                            <td class=" date">
                                                <p>{{\Morilog\Jalali\Jalalian::forge($order->created_at)->format("Y/m/d")}}</p>
                                            </td>
                                            <td class="price">
                                                <p> {{number_format($order->price_with_taxation)}} تومان</p>
                                            </td>
                                            <td class="status">
                                                <p>پرداخت ناموفق</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                    @endif
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
        $('#before_buying, #before_buying2').click(function () {
            $.ajax({
                url : '{{route('before_buying')}}',
                type : "get",
                @if(Illuminate\Support\Facades\Session::has('product') && !empty(Illuminate\Support\Facades\Session::get('product')))
                data : {'id' : {{json_encode($id)}} },
                @endif
                success : function (data) {
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
                        window.location.href = data.result;
                    }
                }
            });
        })
    </script>
@endsection
