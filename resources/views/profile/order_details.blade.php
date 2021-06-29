@extends("layouts.master")

@section("title")
    <title>وب سرویس های من | CioCe.ir</title>
@endsection

@section("content")

    <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">
                    @include('profile.sidebar')

                    <!-- Start Content -->
                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                            <div class="row">
                                @if(isset($order))
                                <div class="col-12">
                                    <div class="profile-navbar">
                                        <a href="{{route('orders')}}" class="profile-navbar-btn-back">بازگشت</a>
                                        <h4>سفارش <span class="font-en">{{$order->order_number}}</span><span>ثبت شده در تاریخ {{\Morilog\Jalali\Jalalian::forge($order->created_at)->format("Y/m/d")}}</span></h4>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="dt-sl dt-sn">
                                        <div class="row table-draught px-3">
                                            <div class="col-md-6 col-sm-12">
                                                <span class="title">تعداد محصولات:</span>
                                                <span class="value">{{count($products)}} عدد</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span class="title">شماره پیگیری:</span>
                                                <span class="value">{{$order->id}}</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span class="title">وضعیت سفارش:</span>
                                                <span class="value">{{App\Models\Orders::status($order->status)}}</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span class="title">وضعیت پرداخت:</span>
                                                <span class="value">{{$order->status_payment}}</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span class="title">هزینه راه‌اندازی:</span>
                                                <span class="value">ندارد</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <span class="title">زمان تحویل:</span>
                                                <span class="value">برخط (Online)</span>
                                                <button class="btn btn-light mr-2">
                                                    ثبت شکایات
                                                </button>
                                            </div>
                                            <div class="col-12 text-center pb-0">
                                                <span class="title">مبلغ قابل پرداخت:</span>
                                                <span class="value">{{number_format($order->last_price)}} تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif


                                @if(isset($products[0]))
                                <div class="col-12">
                                    <div
                                        class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                        <h2>محصولات این سفارش</h2>
                                    </div>
                                    <div class="dt-sl">
                                        <div class="table-responsive">
                                            <table class="table table-order table-order-details">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>نام محصول</th>
                                                    <th>تعداد</th>
                                                    <th>قیمت واحد</th>
                                                    <th>قیمت کل</th>
                                                    <th>تخفیف</th>
                                                    <th>قیمت نهایی</th>
{{--                                                    <th>عملیات</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($products as $key => $item)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>
                                                        <div class="details-product-area">
                                                            <img src="/uploads/thumbnail/{{$item->thumbnail ?? "noimage_200.jpg"}}"
                                                                 class="thumbnail-product" alt="{{$item->product_name}}">
                                                            <h5 class="details-product">
                                                                <span>{{$item->product_name}}</span>
{{--                                                                <span>گارانتی 33</span>--}}
{{--                                                                <span>فروشنده : اوند </span>--}}
{{--                                                                <span>رنگ : سفید</span>--}}
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td>1</td>
                                                    <td>{{number_format($item->product_price)}} تومان</td>
                                                    <td>{{number_format($item->product_price)}} تومان</td>
                                                    <td>{{$item->discount}}%</td>
                                                    <td>{{number_format($item->product_price - (($item->product_price * $item->discount) / 100))}} تومان</td>
{{--                                                    <td>--}}
{{--                                                        <a href="#" class="btn btn-info d-block w-100 mb-2">خرید--}}
{{--                                                            مجدد</a>--}}
{{--                                                        <a href="#" class="btn text-light bg-secondary d-block w-100">ثبت--}}
{{--                                                            نظر</a>--}}
{{--                                                    </td>--}}
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    <!-- End Content -->
                </div>
            </div>
        </main>
        <!-- End main-content -->


@endsection

@section('extra_js')

@endsection
