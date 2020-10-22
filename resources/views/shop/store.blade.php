@extends("layouts.master")

@section("title")
    <title>فروشگاه {{ $result['title'] }}
        @if(Str::length($result['branch_slug']) > 0)
             شعبه {{ $result['branch'] }}
        @endif
        | ثمین تخفیف</title>
@endsection
@section("extra_css")
    <style>
        h1,h2,h3,h4,h5,h6{
            color: {{ $result['color'] }};
        }
        .logo_shop_bg{
            background-color:{{ $result['color'] }}
        }
        .comment-title{
            width:100%;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 3px;
            text-align: center;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background: -webkit-linear-gradient(-25deg,{{ $result['color'] }} 0%, #fff 85%);
            background: -moz-linear-gradient(-25deg,{{ $result['color'] }} 0%, #fff 85%);
            background: -o-linear-gradient(-25deg,{{ $result['color'] }} 0%, #fff 85%);
            background: -ms-linear-gradient(-25deg,{{ $result['color'] }} 0%, #fff 85%);
            background: linear-gradient(-25deg,{{ $result['color'] }} 0%, #fff 85%);
        }
        .comment-title h2{
            color:#fff;
        }
        .submit-comment{
            background-color: {{ $result['color'] }};
        }
        .like:hover,.bookmark:hover{
            cursor: pointer;
        }
    </style>
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-2 logo_shop d-flex justify-content-center align-self-center">
                        <img @if(Str::length($result['logo'] ) > 0) src="/images/shop/logo/{{ $result['logo'] }}" @else src="/images/shop/logo/no-image.png" @endif class="img-fluid" style="max-width: 140px;max-height: 140px" alt="logo">
                    </div>
                    <div class="col-12 col-lg-10 py-3">
                        <div class="logo_shop_bg w-100 p-3">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <h1 class="text-white mb-0">
                                        <span class="font-18 nowrap"><i class="fa fa-shopping-basket pl-2"></i>فروشگاه {{ $result['title'] }}</span>
                                    </h1>
                                </div>
                                <div class="col-12 col-lg-4 text-left">
                                    @if(Str::length($result['branch_slug']) > 0)
                                        <h2 class="text-white mb-0 mt-2">
                                            <span class="nowrap font-14"><i class="fa fa-map-marker text-white pl-1"></i> شعبه {{ $result['branch'] }} </span>
                                        </h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="logo_shop_bg w-100 px-3 pt-0 pb-3">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="text-white mb-0">
                                        آدرس:<span class="font-13"> {{ $result['address'] }} </span>
                                    </h2>
                                </div>
                                <div class="col-12 col-lg-6 text-left">
                                    <h2 class="text-white mb-0 mt-2">
                                        <span class="bookmark"><i class="fa fa fa-heart font-20 pl-2" title="نشان کردن"></i></span>
                                        <span class="like"><i class="fa fa-thumbs-o-up font-20 ml-2" title="پسندیدم"></i>@if($likeCount > 0)<span class="font-10"><span class="font-15">{{ $likeCount }}</span> نفر پسندیده اند</span>@endif</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                @if(strlen($result['desc']) > 0)
                    <div class="card shadow border-0 mt-3">
                    <div class="card-body p-3">
                        @if ($errors->any())
                            <div class="alert alert-danger mb-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has("status"))
                            <div class="alert text-center alert-success mb-2">{{ Session::get("status") }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12 store_desc">
                                {!! $result['desc'] !!}
                            </div>
                            {{--<div class="col-12">
                                <hr>
                                <div class="owl-container">
                                    <div class="owl-carousel owl-theme owl">
                                        @foreach($products as $product)
                                            <div class="slider-desc text-center overflow-hidden">
                                                <div class="item">
                                                    @if(is_null($product->image))
                                                        <img src="/images/no-image2.png" alt="BTI">
                                                    @else
                                                        <img src="{{Storage::disk('vms')->url($product['image'])}}" alt="BTI">
                                                    @endif
                                                </div>
                                                <div class="price-box rtl">
                                                    <p class="mt-1 font-13 nowrap">{{ $product->product_name }}</p>
                                                    @if($product->discount > 20)
                                                        <div>
                                                            <del class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span class="font-12">ریال</span></del>
                                                            <span class="badge badge-danger font-14 mt-1">{{ $product->discount - 20 }}<span>%</span></span>
                                                            <p class="text-danger font-18 mt-1 nowrap">{{ number_format($product->price - (($product->price * ($product->discount - 20)) / 100)) }} <span class="text-muted font-12">ریال</span></p>
                                                        </div>
                                                    @else
                                                        <div class="mt-1">
                                                            <span class="font-14 mt-1 nowrap">{{ number_format($product->price) }} <span class="font-12">ریال</span></span>
                                                            <p class="text-danger font-14 mt-2 nowrap"><span class="fas fa-gift fa-lg text-danger"></span>  خرید با شارژ هدیه</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                </div>
                @endif
                <div class="card shadow border-0 mt-3" id="comments">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="comment-title">
                                    <h2 class="mb-0">
                                        @if(count($comments) > 0)
                                            <i class="fa fa-comment font-18 mb-2"></i><br><span> {{ count($comments) }} نظر</span>
                                        @else
                                            <i class="fa fa-comment font-18 mb-2"></i><br><span>نظرات</span>
                                        @endif

                                    </h2>
                                </div>
                            </div>
                            <div class="col-12">
                                @foreach($comments as $comment)
                                    <div class="media">
                                        <a class="pull-left"><img style="width: 40px" class="media-object pl-2" src="/images/logo/logo_100_50.png" alt=""></a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $comment['name'] }}</h4>
                                            <p>{{ $comment['desc'] }}</p>
                                            <ul class="list-unstyled list-inline media-detail pull-left">
                                                <li>{{ \Morilog\Jalali\Jalalian::forge($comment['created_at'])->format("Y/m/d") }}<i class="fa fa-calendar px-2"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                <hr class="mb-3">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label class="text-muted font-11">نام و نام خانوادگی</label>
                                    <input type="text" name="name" class="form-control name">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label class="text-muted font-11">ایمیل</label>
                                    <input type="email" name="email" class="form-control email">
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="form-group">
                                    <label class="text-muted font-11">توضیحات</label>
                                    <textarea name="desc" class="form-control desc" cols="30" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="form-group text-left">
                                    <button class="btn btn-sm text-white submit-comment">ارسال</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script>
        $(".owl").owlCarousel({
            center: true,
            itemsMobile: false,
            lazyLoad: true,
            responsiveClass: true,
            loop: false,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                    margin: 10
                },
                600: {
                    items: 3,
                    nav: false,
                    margin: 10
                },
                1000: {
                    items: 5,
                    nav: false,
                    margin: 10
                }
            }
        });

        $(".submit-comment").on("click",function(e){
            $(".submit-comment").html("<span class='fa fa-spinner fa-spin d-block mx-auto'></span>");
            $.ajax({
                url: '{{ route("comment_action",["store" => $result['id']]) }}',
                type: 'POST',
                data: {"name":$(".name").val(),"email":$(".email").val(),"desc":$(".desc").val()},
                success: function(data) {
                    if(data.status == "0"){
                        alert(data.desc);
                    }else if(data.status == "1"){
                        window.location.reload();
                    }
                    $(".submit-comment").html("ارسال");
                },
            });
            e.preventDefault();
        });

        $(".bookmark").on("click",function(e){
            $(".bookmark").html("<span class='fa fa-spinner fa-spin font-20 px-2'></span>");
            $.ajax({
                url: '{{ route("bookmark") }}',
                type: 'POST',
                data: {"store":"{{ $result['id'] }}"},
                success: function(data) {
                    if(data.status == "0"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'warning',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }else if(data.status == "1") {
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 2500
                        });
                    }
                    $(".bookmark").html('<i class="fa fa fa-heart font-20 pl-2" title="نشان کردن"></i>');
                },
            });
            e.preventDefault();
        });

        $(".like").on("click",function(e){
            $(".like").html("<span class='fa fa-spinner fa-spin font-20'></span>");
            $.ajax({
                url: '{{ route("like") }}',
                type: 'POST',
                data: {"store":"{{ $result['id'] }}"},
                success: function(data) {
                    if(data.status == "0"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'warning',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }else if(data.status == "2"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }else if(data.status == "1"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 2500
                        });
                        setTimeout(function(){
                            window.location.reload();
                        },2500);
                    }
                    $(".like").html('<i class="fa fa-thumbs-o-up font-20 ml-2" title="پسندیدم"></i>@if($likeCount > 0)<span class="font-10"><span class="font-15">{{ $likeCount }}</span> نفر پسندیده اند</span>@endif');
                },
            });
            e.preventDefault();
        });

    </script>
@endsection
