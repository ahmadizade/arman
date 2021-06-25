@extends("layouts.master")

@section("title")
    <title>CioCe.ir | سبد خرید</title>
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
                                @if(Illuminate\Support\Facades\Session::has('product') && !empty(Illuminate\Support\Facades\Session::get('product')))
                                    <div class="col-xl-9 col-lg-8 col-12 px-0">
                                    <div class="table-responsive checkout-content dt-sl">
                                        <div class="checkout-header checkout-header--express">
                                            <span class="checkout-header-title">ارسال عادی</span>
                                            <span class="checkout-header-extra-info">({{count(\Illuminate\Support\Facades\Session::get('product'))}} کالا)</span>
                                        </div>
                                        @php
                                            $price = 0;
                                            $discount_price = 0;
                                            $last_price = 0;
                                        @endphp
                                        @foreach(\Illuminate\Support\Facades\Session::get('product') as $key => $item)
                                            <table class="table table-cart">
                                            <tbody>
                                                <tr class="checkout-item">
                                                    <td>
                                                        <img src="/uploads/thumbnail/{{$item->thumbnail ?? 'noimage_200.jpg'}}" alt="{{$item->english_name}}" style="width: 100px;height: 100px;">
                                                        <a href="{{route('cart_product_delete' , $key)}}" class="checkout-btn-remove">&times;</a>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{route('single_product' , $item->product_slug)}}">
                                                            <h3 class="checkout-title">
                                                                {{$item->product_name}}
                                                            </h3>
                                                        </a>
                                                        <p class="checkout-dealer">
                                                            فروشنده: فروشگاه آنلاین سی و سه (CioCe)
                                                        </p>
                                                        <p class="checkout-guarantee">گارانتی 18 ماهه</p>
                                                        <div class="checkout-variant checkout-variant--color">
                                                            <span class="checkout-variant-title">تخفیف :</span>
                                                            @if ($item->discount > 0)
                                                                <span class="checkout-variant-value">
                                                                % {{$item->discount}}
                                                                </span>
                                                            @else
                                                                <span class="text-muted">بدون تخفیف</span>
                                                            @endif
                                                        </div>
                                                        <a href="{{route('single_product' , $item->product_slug)}}" class="checkout-save-for-later">دسته بندی : {{$item->category->name}}</a>
                                                    </td>
                                                    <td>
                                                        <p class="line-through">{{number_format($item->price)}} تومان</p><span>قیمت : </span>
                                                        <strong class="red-price">{{number_format($discount_price = $item->price -  ($item->price * $item->discount) / 100 )}} تومان</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            @php
                                                $price += $item->price;
                                                $last_price += $discount_price;
                                            @endphp
                                        @endforeach
                                    </div>
                                </div>

                                @else
                                    <div class="col-12">
                                        <div class="dt sl dt-sn dt-sn--box pt-3 pb-5">
                                            <div class="cart-page cart-empty">
                                                <div class="circle-box-icon">
                                                    <i class="mdi mdi-cart-remove"></i>
                                                </div>
                                                <p class="cart-empty-title">سبد خرید شما خالیست!</p>
                                                <p>می‌توانید برای مشاهده محصولات بیشتر به صفحات زیر بروید:</p>
                                                <div class="cart-empty-links mb-5">
                                                    <a href="#" class="border-bottom-dt">لیست مورد علاقه من</a>
                                                    <a href="#" class="border-bottom-dt">محصولات شگفت‌انگیز</a>
                                                    <a href="#" class="border-bottom-dt">محصولات پرفروش روز</a>
                                                </div>
                                                <a href="#" class="btn-primary-cm">ادامه خرید در دیدیکالا</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            {{--Sidebar--}}
                                @if(Illuminate\Support\Facades\Session::has('product') && !empty(Illuminate\Support\Facades\Session::get('product')))
                                    <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                                    <div class="dt-sn dt-sn--box mb-2">
                                        <ul class="checkout-summary-summary">
                                            <li>
                                                <span>مبلغ کل ({{count(\Illuminate\Support\Facades\Session::get('product'))}} کالا)</span><span>
                                                    {{number_format($price)}} تومان
                                                </span>
                                            </li>
                                            <li class="checkout-summary-discount">
                                                <span>سود شما از خرید</span><span class="red-price">{{number_format($price - $last_price)}} تومان</span>
                                            </li>
                                            <li>
                                                <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip"
                                                        data-html="true" data-placement="bottom"
                                                        title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></span><span>وابسته به کالا</span>
                                            </li>
                                            <li class="checkout-club-container">
                                                <span>سیوکلاب<span class="help-sn" data-toggle="tooltip"
                                                        data-html="true" data-placement="bottom"
                                                        title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>با امتیازهای خود در باشگاه مشتریان سی و سه (سیوکلاب) از بین جوایز متنوع انتخاب کنید.</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></span><span><span>۱۵۰+</span><span> امتیاز</span></span>
                                            </li>
                                        </ul>
                                        <div class="checkout-summary-devider">
                                            <div></div>
                                        </div>
                                        <div class="checkout-summary-content">
                                            <div class="checkout-summary-price-title">مبلغ قابل پرداخت</div>
                                            <div class="checkout-summary-price-value">
                                                <span class="checkout-summary-price-value-amount">{{number_format($last_price)}}</span>
                                                تومان
                                            </div>
                                            @auth()
                                                <a href="{{route('before_buying' , ['price' => $price , 'last_price' => $last_price])}}" class="mb-2 d-block">
                                                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                        <i class="mdi mdi-arrow-left"></i>
                                                        ادامه ثبت سفارش
                                                    </button>
                                                </a>
                                            @endauth

                                            @guest()
                                                <a id="before_buying" href="javascript:void(0)" class="mb-2 d-block">
                                                    <button class="btn-primary-cm text-muted btn-with-icon w-100 text-center pr-0">
                                                        <i class="mdi mdi-arrow-left"></i>
                                                        ادامه ثبت سفارش
                                                    </button>
                                                </a>
                                            @endguest
                                            <div>
                                                <span>
                                                    کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                                    مراحل بعدی را تکمیل کنید.
                                                </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                    data-placement="bottom"
                                                    title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span></div>
                                        </div>
                                    </div>
                                    <div class="dt-sn dt-sn--box checkout-feature-aside pt-4">
                                        <ul>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/return-policy.svg" alt="">
                                                هفت روز ضمانت تعویض
                                            </li>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/payment-terms.svg" alt="">
                                                پرداخت در محل با کارت بانکی
                                            </li>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/delivery.svg" alt="">
                                                تحویل اکسپرس
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            {{--Sidebar--}}
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
    <script>
        $('#before_buying').click(function () {
            alert("لطفا ابتدا ثبت نام کنید")
        })
    </script>
@endsection
