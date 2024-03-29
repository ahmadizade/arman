<!-- Start Products Area -->
<section class="products-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>پربازدیدترین ها</h2>
        </div>

        <div class="row">
            @foreach($lastProduct as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-products-box">
                        <div class="image">
                            <a href="{{ route("single_product",["slug" => $item->product_slug]) }}" class="d-block"><img src="/uploads/thumbnail/{{$item->thumbnail ?? "noimage_500.jpg"}}" alt="{{$item->product_name}}"></a>

                            <div class="buttons-list">
                                <ul>
                                    <li>
                                        <div class="cart-btn">
                                            <a href="{{route('cart', ['id' => $item->id])}}">
                                                <i class="bx bxs-cart-add"></i>
                                                <span class="tooltip-label">افزودن به سبد خرید</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wishlist-btn">
                                            <a href="#" data-id="{{$item->id}}" class="bookmark_btn">
                                                <i class="bx bx-heart"></i>
                                                <span class="tooltip-label">افزودن به لیست علاقه مندی ها</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div data-id="{{$item->id}}" class="quick-view-btn">
                                            <a href="#" data-toggle="modal" data-target="#productsQuickView">
                                                <i class="bx bx-search-alt"></i>
                                                <span class="tooltip-label">مشاهده سریع</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="content text-center">
                            <h3><a href="{{ route("single_product",["slug" => $item->product_slug]) }}">{{$item->product_name}}</a></h3>
{{--                            <div class="price">--}}
{{--                                <span class="new-price">{{number_format($item->price)}} تومان</span>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Products Area -->
