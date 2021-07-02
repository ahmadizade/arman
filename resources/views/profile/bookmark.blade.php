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
                                    <h2>علاقمندی‌ها</h2>
                                </div>
                                <div class="dt-sl">
                                    <div class="row">
                                        @if (isset($bookmark[0]))
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
                                                                    <h3>{{$item->product->product_name}}</h3>
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
                                                                <span>
                                                                    @if ($item->product->price > 0)
                                                                        {{number_format($item->product->price)}} تومان
                                                                    @elseif ($item->product->price == 0)
                                                                        <span>رایگان</span>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="card-horizontal-product-buttons">
                                                                <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}" class="btn">مشاهده محصول</a>
                                                                <button class="remove-btn delete_bookmark">
                                                                    <i data-id="{{$item->id}}" class="mdi mdi-trash-can-outline"></i>
                                                                </button>
                                                                <span class="label-card-horizontal-product" style="font-size:14px;">
                                                                    <a class="text-danger" href="{{route('category',["slug" => $item->product->category->slug])}}">{{$item->product->category->name ?? "سی و سه"}}</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-12">
                                                <div class="dt sl dt-sn dt-sn--box pt-3 pb-5">
                                                    <div class="cart-page cart-empty">
                                                        <div class="circle-box-icon">
                                                            <i class="mdi mdi-cart-remove"></i>
                                                        </div>
                                                        <p class="cart-empty-title">یعنی به هیچی علاقه نداشتی!</p>
                                                        <p>بابا مگه میشه، مگه داریم آخه! این همه محصول و ربات و وب سرویس!</p>
                                                        <div class="cart-empty-links mb-5">
                                                            <a href="{{route('category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">وب سرویس های رایگان</a>
                                                            <a href="{{route('category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">پربازدیدترین ها</a>
                                                            <a href="{{route('category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">وب سرویس های پرفروش</a>
                                                        </div>
                                                        <a href="{{route('home')}}" class="btn-primary-cm">بازگشت به صفحه اصلی</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2>پسند شده‌ها</h2>
                                </div>
                                <div class="dt-sl">
                                    <div class="row">
                                        @if (isset($like[0]))
                                            @foreach($like as $item)
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
                                                                    <h3>{{$item->product->product_name}}</h3>
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
                                                                <span>
                                                                    @if ($item->product->price > 0)
                                                                        {{number_format($item->product->price)}} تومان
                                                                    @elseif ($item->product->price == 0)
                                                                        <span>رایگان</span>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="card-horizontal-product-buttons">
                                                                <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}" class="btn">مشاهده محصول</a>
                                                                <button class="remove-btn delete_like">
                                                                    <i data-id="{{$item->id}}" class="mdi mdi-trash-can-outline"></i>
                                                                </button>
                                                                <span class="label-card-horizontal-product" style="font-size:14px;">
                                                                    <a class="text-danger" href="{{route('category',["slug" => $item->product->category->slug])}}">{{$item->product->category->name ?? "سی و سه"}}</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-12">
                                                <div class="dt sl dt-sn dt-sn--box pt-3 pb-5">
                                                    <div class="cart-page cart-empty">
                                                        <div class="circle-box-icon">
                                                            <i class="mdi mdi-cart-remove"></i>
                                                        </div>
                                                        <p class="cart-empty-title">یعنی هیچی پسند نکردی؟!</p>
                                                        <p>من دیگه حرفی ندارم!</p>
                                                        <div class="cart-empty-links mb-5">
                                                            <a href="{{route('category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">وب سرویس های رایگان</a>
                                                            <a href="{{route('category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">پربازدیدترین ها</a>
                                                            <a href="{{route('category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">وب سرویس های پرفروش</a>
                                                        </div>
                                                        <a href="{{route('home')}}" class="btn-primary-cm">بازگشت به صفحه اصلی</a>
                                                    </div>
                                                </div>
                                            </div>
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
@section('extra_js')
    <script>
        $( document ).ready(function() {
            $('body').on('click','.delete_bookmark i',function (e){
                e.preventDefault();
                $.ajax({
                    url : '{{route('profile_bookmark_delete')}}',
                    type : 'POST',
                    data : {'id' : $(this).attr("data-id")},
                    success : function (data){
                        if(data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                title: "CioCe",
                                text: data.desc,
                                footer: "www.cioce.ir",
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        if(data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                title: "CioCe",
                                text: data.desc,
                                footer: "www.cioce.ir",
                                showConfirmButton: false,
                                timer: 3000
                            });
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $( document ).ready(function() {
            $('body').on('click','.delete_like i',function (e){
                e.preventDefault();
                $.ajax({
                    url : '{{route('profile_like_delete')}}',
                    type : 'POST',
                    data : {'id' : $(this).attr("data-id")},
                    success : function (data){
                        if(data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                title: "CioCe",
                                text: data.desc,
                                footer: "www.cioce.ir",
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        if(data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                title: "CioCe",
                                text: data.desc,
                                footer: "www.cioce.ir",
                                showConfirmButton: false,
                                timer: 3000
                            });
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection
