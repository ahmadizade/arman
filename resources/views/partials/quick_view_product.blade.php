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



            <ul class="products-info">
                <li><span style="font-size: 24px;" class="bx bx-phone text-success"></span> <a href="{{route('home')}}">تماس با واحد فروش : </a></li>
                <li><a style="font-size: 18px;" class="my_rtl" href="tel:+1234567898">021-22407230 , 021-22407229</a></li>
            </ul>


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


            <div class="price">
                @if($product->discount > 0)
                    <span class="old-price">
                                    @if ($product->price > 0)
                            {{number_format($product->price)}} تومان
                        @elseif ($product->price == 0)
                            <span class="text-danger" style="font-size: 20px">رایگان</span>
                        @endif
                                </span>
                    <input type="text" class="new-price" value="{{number_format($product->price - ($product->price * $product->discount) / 100)}}"><span>تومان</span>
                @else
                    <input type="text" class="new-price" value="{{number_format($product->price)}}"><span>تومان</span>
                @endif
            </div>


            <div class="products-add-to-cart">
                <div class="input-counter">
                    <span class="minus-btn button-card decremnet"><i class="bx bx-minus"></i></span>
                        <input class="count-buy" type="text" min="1" value="1">
                    <span class="plus-btn button-card increment"><i class="bx bx-plus"></i></span>
                </div>

                <button type="submit" class="default-btn"><i class="flaticon-trolley"></i> افزودن به سبد خرید</button>
            </div>
            <a href="{{ route("single_product",["slug" => $product->product_slug]) }}" class="view-full-info">مشاهده اطلاعات کامل محصول</a>
        </div>
    </div>
</div>
@endif
<!-- End QuickView Modal Area -->
