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
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th scope="col">عکس محصول</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">قیمت هر واحد</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">تخفیف</th>
                            <th scope="col">مبلغ قابل پرداخت</th>
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
                                        {{number_format($item->price) ?? ""}} تومان
                                </span>
                            </td>

                            <td class="product-quantity">
                                <div class="input-counter">
                                    <span class="minus-btn button-card-page decremnet"><i class="bx bx-minus"></i></span>
                                    <input class="counter" type="text" min="1" value="{{$item['order_quantity'] ?? 1}}">
                                    <span class="plus-btn button-card-page increment"><i class="bx bx-plus"></i></span>
                                </div>
                            </td>

                            <td class="product-quantity">
                                    @if($item->discount > 0)
                                    <span class="text-danger">{{$item->discount ?? "بدون تخفیف"}} %</span>
                                    @else
                                    <span>بدون تخفیف</span>
                                    @endif
                            </td>

                            <td class="product-subtotal">


                                    @if($item->discount > 0)
                                        @if(isset($item->total_price) && \Illuminate\Support\Str::length($item->total_price) > 0)
                                            <input class="subtotal-amount new-price total_price" value="{{number_format($item['total_price'] - (($item['total_price'] * $item->discount) / 100)) ?? ""}}"> تومان
                                        @else
                                            <input class="subtotal-amount new-price total_price" value="{{number_format($item['price'] - (($item['price'] * $item->discount) / 100)) ?? ""}}"> تومان
                                        @endif
                                    @else
                                        @if(isset($item->total_price) && \Illuminate\Support\Str::length($item->total_price) > 0)
                                            <input class="subtotal-amount new-price total_price" value="{{number_format($item['total_price']) ?? 0}}"> تومان
                                        @else
                                            <input class="subtotal-amount new-price total_price" value="{{number_format($item['price']) ?? 0}}"> تومان
                                        @endif
                                    @endif
                                <input type="hidden" readonly class="single_price cart-price" value="{{$item['price']}}">
                                <input type="hidden" readonly class="product_id" value="{{$item['id']}}">
                                <input type="hidden" readonly class="discount" value="{{$item['discount'] ?? 0}}">

                                <a href="{{route('cart_product_delete', $key)}}" class="remove"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>



                <div class="cart-totals">
                    <h3>مجموع سبد خرید</h3>
                    <ul>
                        <li>تعداد محصولات <span>{{count(\Illuminate\Support\Facades\Session::get('product') ?? 0)}} عدد</span></li>
                        <li>جمع کل <span>{{number_format($total_price) ?? ""}} تومان</span></li>
                        <li>ارزش افزوده <span>{{number_format($taxation) ?? ""}} تومان</span></li>
                        <li>مبلغ قابل پرداخت <span>{{number_format($price_with_taxation)}} تومان</span></li>
                    </ul>
                    <a href="javascript:void(0)" id="shopping_peyment" class="default-btn"><i class="flaticon-trolley"></i> تایید سفارش</a>
                </div>
            </form>
            @endif
        </div>
    </section>
    <!-- End Cart Area -->

    @include('partials.loader')
@endsection
@section('extra_js')
    <script>
        $( document ).ready(function() {
            $('body').on('click','.button-card-page',function (e){
                e.preventDefault();
                $(".loader").addClass('active');
                var $input = $(this).parent().find('.counter');
                var $priceBox = $(this).parent().parent().parent().find('.cart-price');
                var $total_price = $(this).parent().parent().parent().find('.total_price');
                var $single_price = $(this).parent().parent().parent().find('.single_price').val().replace(/,/g, '');
                var $product_id = $(this).parent().parent().parent().find('.product_id').val();
                var $discount = $(this).parent().parent().parent().find('.discount').val();
                $price = $priceBox.val().replace(/,/g, '');

                if ($(this).hasClass('increment')) {
                    $input.val(parseInt($input.val()) + 1);
                    if ($discount > 0){
                        $price = parseFloat($price * $input.val());
                        $helper = parseFloat($price * $discount);
                        $price = $price -  parseFloat($helper / 100);
                    }else{
                        $price = parseFloat($price * $input.val());
                    }
                    $total_price.val(accounting.formatMoney($price));
                    $ .ajax({
                        url : "{{route('cart_calculator')}}",
                        type : "POST",
                        data : {'quantity' : $input.val(), 'product_id' : $product_id},
                        success : function (data) {
                            // $(".loader").removeClass('active');
                            location.reload();
                        }
                    });
                }
                else if ($input.val()>=2){
                    $input.val(parseInt($input.val()) - 1);
                    if ($discount > 0){
                        $price = parseFloat($price * $input.val());
                        $helper = parseFloat($price * $discount);
                        $price = $price -  parseFloat($helper / 100);
                    }else{
                        $price = parseFloat($price * $input.val());
                    }                    $total_price.val(accounting.formatMoney($price));
                    $ .ajax({
                        url : "{{route('cart_calculator')}}",
                        type : "POST",
                        data : {'quantity' : $input.val(), 'product_id' : $product_id},
                        success : function (data) {
                            // $(".loader").removeClass('active');
                            location.reload();
                        }
                    });

                }else {
                    $(".loader").removeClass('active');
                }
            });

            $('body').on('change','.counter',function (e){
                e.preventDefault();
                $(".loader").addClass('active');
                var $input = $(this).parent().find('.counter');
                var $priceBox = $(this).parent().parent().parent().find('.cart-price');
                var $single_price = $(this).parent().parent().parent().find('.single_price').val().replace(/,/g, '');
                var $total_price = $(this).parent().parent().parent().find('.total_price');
                var $product_id = $(this).parent().parent().parent().find('.product_id').val();
                var $discount = $(this).parent().parent().parent().find('.discount').val();

                if ($discount > 0){
                    $price = parseFloat($single_price * $input.val());
                    $helper = parseFloat($price * $discount);
                    $price = $price -  parseFloat($helper / 100);
                }else{
                    $price = parseFloat($single_price * $input.val());
                }


                $total_price.val(accounting.formatMoney($price));

                $ .ajax({
                    url : "{{route('cart_calculator')}}",
                    type : "POST",
                    data : {'quantity' : $input.val(), 'product_id' : $product_id},
                    success : function (data) {
                        // $(".loader").removeClass('active');
                        location.reload();
                    }
                });


            });

            $('body').on('click','#shopping_peyment',function (e){
                e.preventDefault();

                var $total_price = {{$total_price ?? ""}};
                var $taxation = {{$taxation ?? "" }};
                var $price_with_taxation = {{$price_with_taxation ?? ""}};

                $ .ajax({
                    url : "{{route('before_buying')}}",
                    type : "POST",
                    data : {'total_price' : $total_price, 'taxation' : $taxation, 'price_with_taxation' : $price_with_taxation},
                    success : function (data) {
                        console.log(data);
                        if(data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 4000
                            });
                        };
                        if(data.status == "1") {
                            window.location.replace('/cart/shipping-page');
                        };
                    }

                });


            });
        });
    </script>
@endsection
