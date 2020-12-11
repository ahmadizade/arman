<!-- Popular Products -->
@if(isset($popularproduct))
    <div class="container mt-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 my-3">
                <h2 class="title-default green"><span>پر بازدیدترین ها</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-container">
                    <div class="owl-carousel owl-theme owl">
                        @foreach($popularproduct as $product)
                            <a href="{{ route("single_product",["slug" => $product->product_slug]) }}">
                                <div class="slider-desc text-center overflow-hidden">
                                    <div class="item">
                                        <div style="min-height: 200px;" class="row justify-content-center align-items-center">
                                            @if(is_null($product->image))
                                                <img src="/images/no-image2.png" alt="BTI" class="img-fluid">
                                            @else
                                                <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="CioCe.ir" class="img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="price-box rtl">
                                        <p class="font-14 pb-2 border-bottom nowrap font-weight-bold">{{ $product->product_name }}</p>
                                        @if($product->free == 0)
                                            <div>
                                                <del class="font-14 nowrap text-secondary">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="font-12">ریال</span></p>
                                            </div>
                                        @elseif($product->free == 1)
                                            <div class="mt-1">
                                                <i class="fa fa-ravelry" aria-hidden="true"></i>
                                                <span class="font-14 mt-1 nowrap text-black">نصب و راه اندازی رایگان</span>
                                                <p class="text-danger font-13 mt-2 nowrap"><span class="fas fa-gift fa-lg"></span>  هدیه ای از ما به تو</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
