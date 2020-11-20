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
            padding: 10px 20px;
            margin-bottom: 25px;
            border-radius: 3px;
            text-align: center;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: {{ $result['color'] }};
        }
        .comment-title h2{
            color:#fff;
        }
        .submit-comment{
            background-color: {{ $result['color'] }};
        }
        .like:hover,.bookmark:hover,.report:hover,.map:hover{
            cursor: pointer;
        }
    </style>
@endsection

@section("content")

    <div class="modal fade" id="report" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title">گزارش مشکل آگهی</h5>
                </div>
                <div class="modal-body">
                    <p class="text-muted text-center">نزدیک ترین گزینه را انتخاب کنید. ارائه جزییات بیشتر، به ما امکان بررسی سریع‌تر و دقیق‌تر مشکل را می‌دهد.</p>
                    <form id="report-form" action="{{ route("report") }}" method="post">
                        <input type="hidden" name="store" value="{{ $result['id'] }}">
                        <div class="form-group mb-0 text-right">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="report" value="1">
                            <label class="form-check-label mr-4">
                                محتوای آگهی فروشگاه
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="report" value="2">
                            <label class="form-check-label mr-4">
                                تصاویر فروشگاه
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="report" value="3">
                            <label class="form-check-label mr-4">
                                 اطلاعات تماس
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="report" value="4">
                            <label class="form-check-label mr-4">
                                کلاهبرداری، نقض قانون یا وقوع جرم
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="report" value="5">
                            <label class="form-check-label mr-4">
                                آدرس و نقشه
                            </label>
                        </div>
                        <div class="form-check mt-3 pl-0">
                            <textarea class="form-control" name="desc" rows="7" placeholder="توضیحات"></textarea>
                        </div>
                    </div>
                        <p class="text-center mb-0"><button class="btn btn-warning btn-sm mt-3 report-submit">ثبت گزارش</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-12 py-3">
                        <div class="logo_shop_bg w-100 p-3">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <h1 class="text-white mb-0">
                                        <span class="font-18 nowrap"><i class="fa fa-shopping-basket pl-2"></i>فروشگاه {{ $result['shop'] }}</span>
                                    </h1>
                                </div>
                                <div class="col-12 col-lg-4 text-left">
                                    @if(Str::length($result['branch_slug']) > 0)
                                        <h2 class="text-white mb-0">
                                            <span class="nowrap font-14"><i class="fa fa-map-marker text-white pl-1 font-20"></i> شعبه {{ $result['branch'] }} </span>
                                        </h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 mt-2">
                <div class="text-center">
                    <img @if(Str::length($result['logo']) > 0) src="/images/shop/logo/{{ $result['logo'] }}" @else src="/images/shop/logo/no-image.png" @endif class="img-fluid" alt="logo">
                </div>
                <hr>
                <div class="text-center">
                    <span class="report" data-toggle="modal" data-target="#report"><i class="fa fa-exclamation-circle font-20 pl-2" title="گزارش تخلف"></i></span>
                    <span class="bookmark"><i class="fa fa-bookmark font-20 pl-2" title="نشان کردن"></i></span>
                    <span class="like"><i class="fa fa-heart text-danger font-20 ml-2" title="پسندیدم"></i>@if($likeCount > 0)<span class="font-10"><span class="font-15">{{ $likeCount }}</span> نفر پسندیده اند</span>@endif</span>
                </div>
                @if(strlen($result['about']) > 10)
                    <hr>
                    <h3><span class="fa fa-address-book-o pl-2"></span>بیوگرافی:</h3>
                    <p>
                        {{ $result['about'] }}
                    </p>
                @endif
                @if(strlen($result['address']) > 0)
                    <hr>
                    <h3><span class="fa fa-map-marker pl-2"></span>آدرس فروشگاه:</h3>
                    <p>
                        {{ $result['address'] }}
                     {{--   @if(isset($user->id))
                            <div class="mt-2"><span class="fa fa-phone font-17 pl-2"></span> تلفن {{ $user->phone }}</div>
                        @endif--}}
                    </p>
                @endif
                {{--@if(strlen($result['map']) > 10)--}}
                    <hr>
                    <h3><span class="fa fa-map-marker pl-2"></span>مکان بر روی نقشه:</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12949.29648675451!2d51.4552484881714!3d35.76741376606546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1603803763903!5m2!1sen!2s" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                {{--@endif--}}
                    <hr>
                    <h3><span class="fa fa-map-marker pl-2"></span>نزدیکترین فروشگاه ها به شما:</h3>
                    @if(isset($suggest))
                        @foreach($suggest as $item)
                            <div>
                                <a target="_blank" href="{{ route("single_shop",["shop" => $item['shop_slug'],"branch" => $item['branch_slug'] ]) }}"><img src="/images/shop/logo/{{ $item['logo'] }}" class="pl-2" style="width: 50px" alt="{{ $item['shop'] }}">فروشگاه {{ $item['shop'] }}</a>
                            </div>
                        @endforeach
                    @endif
                    <hr>
            </div>
            <div class="col-12 col-lg-9">
                @if(strlen($result['desc']) > 0)
                    <div class="card shadow border-0 mt-2">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12 col-lg-12 store_desc">
                                    {!! $result['desc'] !!}
                                </div>
                                <div class="col-12">
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
                                </div>
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
            loop: true,
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
            $(this).html("<span class='fa fa-spinner fa-spin d-block mx-auto'></span>");
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
            $(this).html("<span class='fa fa-spinner fa-spin font-20 px-2'></span>");
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
                            timer: 3000
                        })
                    }else if(data.status == "1") {
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                    $(".bookmark").html('<i class="fa fa-bookmark font-20 pl-2" title="نشان کردن"></i>');
                },
            });
            e.preventDefault();
        });

        $(".like").on("click",function(e){
            $(this).html("<span class='fa fa-spinner fa-spin font-20'></span>");
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
                            timer: 3000
                        })
                    }else if(data.status == "2"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }else if(data.status == "1"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout(function(){
                            window.location.reload();
                        },3000);
                    }
                    $(".like").html('<i class="fa fa-heart text-danger font-20 ml-2" title="پسندیدم"></i>@if($likeCount > 0)<span class="font-10"><span class="font-15">{{ $likeCount }}</span> نفر پسندیده اند</span>@endif');
                },
            });
            e.preventDefault();
        });

        $(".report-submit").on("click",function(e){
            $(this).html("<span class='fa fa-spinner fa-spin font-20 px-2'></span>");
            $.ajax({
                url: '{{ route("report") }}',
                type: 'POST',
                data: $("#report-form").serialize(),
                success: function(data) {
                    if(data.status == "0"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'warning',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }else if(data.status == "2"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }else if(data.status == "1"){
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout(function(){
                            window.location.reload();
                        },3000);
                    }
                    $(".report-submit").html('ثبت گزارش');
                },
            });
            e.preventDefault();
        });
    </script>
@endsection
