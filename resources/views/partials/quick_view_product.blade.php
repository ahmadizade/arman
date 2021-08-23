<!-- Strat QuickView Modal Area -->
@if(isset($product))
<div class="row align-items-center">
    <div class="col-lg-6 col-md-6">
        <div class="products-image">
            <img src="/uploads/thumbnail/{{$product->thumbnail ?? ""}}" alt="{{$product->product_name ?? ""}}">
        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="products-content">
            <h3><a href="#">{{$product->product_name ?? ""}} </a></h3>

            <div class="price">
                @if($product->discount > 0)
                    <span class="old-price">
                                    @if ($product->price > 0)
                            {{number_format($product->price)}} تومان
                        @elseif ($product->price == 0)
                            <span class="text-danger" style="font-size: 20px">رایگان</span>
                        @endif
                                </span>
                    <span class="new-price">{{$product->price - ($product->price * $product->discount) / 100}} تومان</span>
                @else
                    <span class="new-price">
                                    @if ($product->price > 0)
                            {{number_format($product->price)}} تومان
                        @elseif ($product->price == 0)
                            <span class="text-danger" style="font-size: 20px">رایگان</span>
                        @endif
                                </span>
                @endif
            </div>


            <div class="products-review">
                <div class="rating">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                </div>
                <a href="javascript:void(0)" class="rating-count">{{$product->view ?? 1}} بازدید</a>
            </div>

            <ul class="products-info">
                <li><span>فروشنده: </span> <a href="{{route('home')}}">فروشگاه آرمان</a></li>
                <li><span>موجودی: </span> <a href="#">موجود است</a></li>
                <li><span>دسته بندی: </span> <a href="{{route('single_category',["slug" => $product->category->slug])}}">{{$product->category->name ?? ""}}</a></li>
            </ul>

{{--            <div class="products-color-switch">--}}
{{--                <h4>رنگ:</h4>--}}

{{--                <ul>--}}
{{--                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="سیاه" class="color-black"></a></li>--}}
{{--                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="سفید" class="color-white"></a></li>--}}
{{--                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="سبز" class="color-green"></a></li>--}}
{{--                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="سبز زرد" class="color-yellowgreen"></a></li>--}}
{{--                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="چاله" class="color-teal"></a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <div class="products-size-wrapper">--}}
{{--                <h4>اندازه:</h4>--}}

{{--                <ul>--}}
{{--                    <li><a href="#">کوچک</a></li>--}}
{{--                    <li class="active"><a href="#">متوسط</a></li>--}}
{{--                    <li><a href="#">بزرگ</a></li>--}}
{{--                    <li><a href="#">خیلی بزرگ</a></li>--}}

{{--                </ul>--}}
{{--            </div>--}}
            <ul class="products-info">
                <li><span style="font-size: 24px;" class="bx bx-phone text-success"></span> <a href="{{route('home')}}">تماس با واحد فروش : </a></li>
                <li><a style="font-size: 18px;" class="my_rtl" href="tel:+1234567898">021-22407230 , 021-22407229</a></li>
{{--                <li><span>آدرس فروشگاه: </span> <a class="text-primary" style="font-size: 12px;" href="{{route('contact')}}">کلیک کن!</a></li>--}}
            </ul>
            <div class="products-add-to-cart">
{{--                <div class="input-counter">--}}
{{--                    <span class="minus-btn"><i class="bx bx-minus"></i></span>--}}
{{--                    <input type="text" min="1" value="1">--}}
{{--                    <span class="plus-btn"><i class="bx bx-plus"></i></span>--}}
{{--                </div>--}}

{{--                <button type="submit" class="default-btn"><i class="flaticon-trolley"></i> افزودن به سبد خرید</button>--}}
            </div>
            <a href="{{ route("single_product",["slug" => $product->product_slug]) }}" class="view-full-info">مشاهده اطلاعات کامل محصول</a>
        </div>
    </div>
</div>
@endif
<!-- End QuickView Modal Area -->
