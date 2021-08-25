@extends("layouts.master")

@section("title")
    <title>armanmask.ir | سبد خرید</title>
@endsection

@section("content")
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>سبد خرید</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>سبد خرید</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Cart Area -->
    <section class="cart-area ptb-70">
        <div class="container">
            @if(Illuminate\Support\Facades\Session::has('product') && !empty(Illuminate\Support\Facades\Session::get('product')))
            <form>
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">تولید - محصول</th>
                            <th scope="col">نام</th>
                            <th scope="col">قیمت واحد</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">جمع</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach(\Illuminate\Support\Facades\Session::get('product') as $key => $item)
                        <tr>
                            <td class="product-thumbnail">
                                <a href="{{ route("single_product",["slug" => $item->product_slug]) }}">
                                    <img src="/uploads/thumbnail/{{$item->thumbnail ?? 'noimage_200.jpg'}}" alt="{{$item->english_name ?? ""}}">
                                </a>
                            </td>

                            <td class="product-name">
                                <a href="{{ route("single_product",["slug" => $item->product_slug]) }}">{{$item->product_name ?? ""}}</a>
                            </td>

                            <td class="product-price">
                                <span class="unit-amount">
                                    @if($item->discount > 0)
                                        {{number_format($item->price - (($item->price * $item->discount) / 100)) ?? ""}}تومان
                                    @else
                                        {{number_format($item->price) ?? ""}}تومان
                                    @endif
                                </span>
                            </td>

                            <td class="product-quantity">
                                <div class="input-counter">
                                    <span class="minus-btn button-card decremnet"><i class="bx bx-minus"></i></span>
                                    <input class="count-buy" type="text" min="1" value="1">
                                    <span class="plus-btn button-card increment"><i class="bx bx-plus"></i></span>
                                </div>
                            </td>

                            <td class="product-subtotal">
                                <span class="subtotal-amount">139000 تومان</span>

                                <a href="{{route('cart_product_delete', $key)}}" class="remove"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="cart-buttons">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-sm-7 col-md-7">
                            <div class="shopping-coupon-code">
                                <input type="text" class="form-control" placeholder="کد تخفیف" name="coupon-code" id="coupon-code">
                                <button type="submit">درخواست تخفیف</button>
                            </div>
                        </div>

                        <div class="col-lg-5 col-sm-5 col-md-5 text-right">
                            <a href="#" class="default-btn"><i class="flaticon-view"></i> به روز رسانی سبد خرید</a>
                        </div>
                    </div>
                </div>

                <div class="cart-totals">
                    <h3>مجموع سبد خرید</h3>

                    <ul>
                        <li>جمع <span>79000 تومان</span></li>
                        <li>حمل و نقل <span>30000 تومان</span></li>
                        <li>در کل <span>830000 تومان</span></li>
                    </ul>

                    <a id="shopping_peyment" href="checkout.html" class="default-btn"><i class="flaticon-trolley"></i> ادامه به پرداخت</a>
                </div>
            </form>
            @endif
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
@section('extra_js')


@endsection
