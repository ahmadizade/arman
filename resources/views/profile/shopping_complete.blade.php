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
                        <div class="item profile-order-steps-item is-active">
                            <img src="/img/svg/0eab59b0.svg">
                            <span>کنترل پشتیبان</span>
                        </div>
                        <div class="item profile-order-steps-item is-active">
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
                                    class="checkout-alert-highlighted checkout-alert-highlighted-success">{{$order->order_number ?? "نام مشخص"}}</span>
                                با موفقیت در سیستم ثبت شد.
                            </h4>
                        </div>
                        <div class="checkout-alert-content">
                            <p class="checkout-alert-content-success">
                                برای مشاهده لینک دانلود <a class="font-weight-bold text-primary" href="{{route('orders')}}">اینجا</a>  کلیک کنید
                            </p>
                        </div>
                    </div>
                    <section class="checkout-details dt-sl dt-sn dt-sn--box mt-4 pt-4 pb-3 pr-3 pl-3 mb-5 px-res-1">
                        <div class="checkout-details-title">
                            <h4>
                                کد سفارش:
                                <span>
                                        {{$order->order_number ?? "نام مشخص"}}
                                    </span>
                            </h4>
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-12">
                                    <div class="checkout-details-title">
                                        <p>
                                            سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                                            <span class="text-highlight text-highlight-success">تکمیل شده</span>
                                            است.
                                            جزئیات این سفارش را می‌توانید با کلیک بر روی دکمه
                                            <a href="{{route('order_details',['order_id' => $order->id])}}" class="border-bottom-dt">پیگیری سفارش</a>
                                            مشاهده نمایید.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <a href="{{route('order_details',['order_id' => $order->id])}}"
                                       class="btn-primary-cm bg-secondary btn-with-icon d-block text-center pr-0">
                                        <i class="mdi mdi-shopping"></i>
                                        دریافت لینک دانلود
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 px-res-0">
                                    <div class="checkout-table">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    نام تحویل گیرنده:
                                                    <span>
                                                            {{\Illuminate\Support\Facades\Auth::user()->name ?? "ثبت نشده"}}
                                                        </span></p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    شماره تماس :
                                                    <span>
                                                            {{\Illuminate\Support\Facades\Auth::user()->mobile ?? "ثبت نشده"}}
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
                                                            <span class="green">
                                                                (موفق)
                                                            </span></span></p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    وضعیت سفارش:
                                                    <span>
                                                            پرداخت شد
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
@endsection
