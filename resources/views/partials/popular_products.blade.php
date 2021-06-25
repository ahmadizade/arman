<div class="row">
    <div class="col-xl-10 col-lg-12">
        <section class="slider-section dt-sl mb-5">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="section-title text-sm-title title-wide no-after-title-wide">
                        <h2>پرفروش ترین ها</h2>
                        <a href="{{route('home')}}">مشاهده همه</a>
                    </div>
                </div>
                @if(isset($popularproduct[0]))
                    <!-- Start Product-Slider -->
                    <div class="col-12 px-res-0">
                        <div class="product-carousel carousel-md owl-carousel owl-theme">
                            @foreach($popularproduct as $item)
                                <div class="item" style="min-height: 300px">
                                    <div class="product-card">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                @if($item->discount > 0)
                                                    <span>{{$item->discount}}%</span>
                                                @elseif($item->discount == 0)
                                                    <span>بدون تخفیف</span>
                                                @endif
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="{{ route("single_product",["slug" => $item->product_slug]) }}">
                                            <img src="/uploads/thumbnail/{{$item->thumbnail}}" alt="{{$item->product_name}}">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="{{ route("single_product",["slug" => $item->product_slug]) }}" class="text-truncate" style="font-size: 13px">{{$item->product_name}}</a>
                                            </h5>
                                            <a class="product-meta text-truncate mt-2" href="{{ route("single_product",["slug" => $item->product_slug]) }}">دسته بندی : {{$item->category->name}}</a>
                                            <span class="product-price">
                                                @if ($item->price > 0)
                                                    قیمت : {{number_format($item->price)}} تومان
                                                @elseif ($item->price == 0)
                                                    <span class="text-danger">قیمت : رایگان</span>
                                                @endif
                                            </span>
                                            <div class="mt-4">
                                                <span class="product-meta d-inline"><i class="fa fa-eye"></i> {{$item->view}}</span>
                                                <span class="product-meta d-inline"><i class="fa fa-bookmark pr-2"></i></span>
                                                <span class="product-meta d-inline"><i class="fa fa-thumbs-up pr-3"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Product-Slider -->
                @endif
            </div>
        </section>
    </div>
    <div class="col-xl-2 col-lg-3 hidden-lg pr-0">
        <div class="widget-suggestion dt-sn pt-3" style="min-height: 444px">
            <div class="widget-suggestion-title">
                <img src="/img/theme/suggestion-title.png" alt="">
            </div>
            <div id="progressBar">
                <div class="slide-progress"></div>
            </div>
            @if(isset($popularproduct[0]))
                <div id="suggestion-slider" class="owl-carousel owl-theme">
                    @foreach($popularproduct as $item)
                        <div class="item" style="min-height: 300px">
                            <div class="product-card">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        @if($item->discount > 0)
                                            <span>{{$item->discount}}%</span>
                                        @elseif($item->discount == 0)
                                            <span>بدون تخفیف</span>
                                        @endif
                                    </div>
                                </div>
                                <a class="product-thumb" href="{{ route("single_product",["slug" => $item->product_slug]) }}">
                                    <img src="/uploads/thumbnail/{{$item->thumbnail}}" alt="{{$item->product_name}}">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="{{ route("single_product",["slug" => $item->product_slug]) }}" class="text-truncate">{{$item->product_name}}</a>
                                    </h5>
                                    <a class="product-meta text-truncate mt-2" href="#">{{$item->category->name}}</a>
                                    <span class="product-price">{{$item->price}} تومان</span>
                                    <div class="mt-4">
                                        <span class="product-meta d-inline"><i class="fa fa-eye"></i> {{$item->view}}</span>
                                        <span class="product-meta d-inline"><i class="fa fa-bookmark pr-2"></i></span>
                                        <span class="product-meta d-inline"><i class="fa fa-thumbs-up pr-3"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
