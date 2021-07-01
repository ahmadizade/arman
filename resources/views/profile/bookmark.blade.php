@extends("layouts.master")

@section("title")
    <title>علاقمندی های من | CioCe.ir</title>
@endsection

@section("content")
        <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">
                    <!-- Start Sidebar -->
                    @include('profile.sidebar')
                    <!-- End Sidebar -->

                    <!-- Start Content -->
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2>علاقمندی ها</h2>
                                </div>
                                <div class="dt-sl">
                                    <div class="row">
                                        @if (isset($bookmark))
                                            @foreach($bookmark as $item)
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="card-horizontal-product">
                                                        <div class="card-horizontal-product-thumb">
                                                            <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}">
                                                                <img src="/uploads/thumbnail/{{$item->product->thumbnail ?? "noimage_64.jpg"}}" alt="{{$item->product_name}}">
                                                            </a>
                                                        </div>
                                                        <div class="card-horizontal-product-content">
                                                            <div class="card-horizontal-product-title">
                                                                <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}">
                                                                    <h3>{{$item->product_name}}</h3>
                                                                </a>
                                                            </div>
                                                            <div class="rating-stars">
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </div>
                                                            <div class="card-horizontal-product-price">
                                                                <span>{{$item->price}} تومان</span>
                                                            </div>
                                                            <div class="card-horizontal-product-buttons">
                                                                <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}" class="btn">مشاهده محصول</a>
                                                                <button class="remove-btn">
                                                                    <i class="mdi mdi-trash-can-outline"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </main>
        <!-- End main-content -->
@endsection
