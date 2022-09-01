@extends("layouts.master")

@section("title")
    @if(\Illuminate\Support\Str::length($product->seo_title) > 1)
        <title>{{ $product->seo_title }} - آرمان ماسک</title>
    @else
        <title>{{ $product->product_name ?? '' }} - آرمان ماسک</title>
    @endif
    @if(\Illuminate\Support\Str::length($product->seo_description) > 1)
        <meta name="description" content="{{ $product->seo_description }}">
    @endif
    <meta name="robots" content="all">
    @if(\Illuminate\Support\Str::length($product->seo_canonical) > 1)
        <link rel="canonical" href="{{ $product->seo_canonical }}">
    @else
        <link rel="canonical" href="{{ url()->full() }}">
    @endif
    @if(\Illuminate\Support\Str::length($product->seo_title) > 1)
        <meta property="og:title" content="{{ $product->seo_title }} - آرمان ماسک">
    @else
        <meta property="og:title" content="{{ $product->product_name ?? '' }} - آرمان ماسک">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    @if(\Illuminate\Support\Str::length($product->seo_description) > 1)
        <meta property="og:site_name" content="{{ $product->seo_description }}">
    @endif
    <meta property="og:image" content="{{ request()->getSchemeAndHttpHost() . '/images/uploads/thumbnail/' . $product->thumbnail ?? '/images/logo.png'}}">

@endsection

@section("content")
    @if(isset($product))
    <!-- Start main-content -->
@include('partials.condition')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{$product->category->name}}</h2>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li><a href="{{route('contact')}}">تماس با ما</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->




    <!-- Start Product Details Area -->
    <section class="product-details-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="products-details-image">
                        <div class="single-products-details-image">
                            <a data-fancybox="gallery" href="/uploads/thumbnail/{{$product->thumbnail}}" class="d-block">
                                <img src="/uploads/thumbnail/{{$product->thumbnail}}" alt="{{$product->product_name ?? ""}}">
                            </a>
                        </div>
                        @if(isset($product->slider) && $product->slider[0])
                            @foreach(json_decode($product->slider) as $image)
                                <div class="single-products-details-image">
                                    <a data-fancybox="gallery" href="/uploads/slider/{{$image}}" class="d-block">
                                        <img src="/uploads/slider/{{$image}}">
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="products-details-desc products-details-desc-sticky">
                        <h1 style="font-size: 30px;">{{$product->product_name}}</h1>

{{--                        <div class="price">--}}
{{--                            @if($product->discount > 0)--}}
{{--                                <span class="old-price">--}}
{{--                                    @if ($product->price > 0)--}}
{{--                                        {{number_format($product->price)}} تومان--}}
{{--                                    @elseif ($product->price == 0)--}}
{{--                                        <span class="text-danger" style="font-size: 20px">رایگان</span>--}}
{{--                                    @endif--}}
{{--                                </span>--}}
{{--                                <span class="new-price text-danger mx-2 font-18">{{number_format($product->price - ($product->price * $product->discount) / 100)}} تومان</span>--}}
{{--                            @else--}}
{{--                                <span class="new-price text-danger mx-2 font-18">--}}
{{--                                    @if ($product->price > 0)--}}
{{--                                        {{number_format($product->price)}} تومان--}}
{{--                                    @elseif ($product->price == 0)--}}
{{--                                        <span class="text-danger" style="font-size: 20px">رایگان</span>--}}
{{--                                    @endif--}}
{{--                                </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}

                        <div class="products-review">
                            @php
                                $rating = 0;
                                if (isset($product->rate_score) && isset($product->rate_count) && $product->rate_score > 0 && $product->rate_count > 0){
                                    $rating = round($product->rate_score / $product->rate_count);
                                }
                            @endphp
                            <div class="rate-score">
                                @for($i=5 ; $i>=1 ; $i--)
                                    <input id="star{{$i}}" type="radio" name="rating" value="{{$i}}"><label data-rate="{{$i}}" class="star @if($i <= $rating) rate @endif" for="star{{$i}}"></label>
                                @endfor
                                    <a href="javascript:void(0)" class="rating-count">{{$product->rate_count ?? 0}} رای</a>
                            </div>
                        </div>

                        <ul class="products-info">
                            <li><span>دسته بندی: </span> <a href="{{route('single_category',["slug" => $product->category->slug])}}">{{$product->category->name ?? ""}}</a></li>
                            <li><span>موجودی: </span> موجود است</li>
                        </ul>



                        <div class="products-info-btn mt-3">
                            <a href="javascript:void(0)"><i class="bx bxs-truck"></i> حمل نقل</a>
                            <a href="tel:02188557335"><i class="bx bx-envelope"></i> در مورد این محصولات سوال کنید</a>
                        </div>



                        <div class="wishlist-btn bookmark_btn" data-id="{{$product->id}}">
                            <a href="javascript:void(0)"><i class="bx bx-heart"></i> افزودن به لیست علاقه مندی ها</a>
                        </div>

                        <div class="buy-checkbox-btn">
                            <div class="item">
                                <a href="{{route('cart', ['id' => $product->id])}}" class="default-btn">افزودن به سبد خرید</a>
                            </div>
                        </div>

                        <div class="products-details-accordion">
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title active" href="javascript:void(0)">
                                        <i class="bx bx-chevron-down"></i>
                                        توضیحات
                                    </a>

                                    <div class="accordion-content show">
                                        {!! $product->product_desc ?? "توضیحاتی ثبت نشده!" !!}
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="bx bx-chevron-down"></i>
                                        نظرات کاربران
                                    </a>

                                    <div class="accordion-content">
                                        <div class="products-review-comments">
                                            <h3>تعداد نظرات : {{$product->rate_count ?? 0}} عدد</h3>
                                            @if(isset($comments) && isset($comments[0]))
                                                @foreach($comments as $comment)
                                                    <div class="user-review">
                                                        <img src="/img/extra/user.png" alt="user">

                                                        <div class="review-rating">
                                                            <span class="d-inline-block">{{$comment->name ?? "ناشناس"}}</span>
                                                        </div>

                                                        <p>{{$comment->desc ?? "متن پیام ثبت نشده!"}}</p>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="review-form-wrapper">
                                            <h3>فرم ثبت نظرات</h3>
                                            <p class="comment-notes">شما می توانید نظرات خود در مورد این محصول را اینجا بنویسید</p>

                                            <form method="POST" action="{{route('new_comment')}}">
                                                <div class="row">
                                                    <input readonly name="product_id" type="hidden" class="form-control" value="{{$product->id}}">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input name="name" type="text" class="form-control" placeholder="نام *">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input name="mobile" type="text" class="form-control" placeholder="شماره تماس *">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="description" placeholder="نظر شما" class="form-control" cols="30" rows="6"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <button type="submit" class="default-btn">ارسال</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="related-products">
            @if(isset($popularproduct) && isset($popularproduct[0]))
                @include('partials.most_visited')
            @endif
        </div>
    </section>
    <!-- End Product Details Area -->




    @endif
@endsection

@section('extra_js')
<script>
    $(document).ready(function(){
        $("body").on("click",".star",function(e){
            $.ajax({
                type: "POST",
                url: "{{ route("rate") }}",
                data: {"rate": $(this).attr('data-rate'), "product_id" : {{$product->id}} },
                success: function (data) {
                    if(data.status == "0") {
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'error',
                            title: 'Rating Error!',
                            text: data.desc,
                            footer: 'ARMANMASK.ir',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                    if(data.status == "1") {
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'success',
                            title: 'Successful',
                            text: data.desc,
                            footer: 'ARMANMASK.ir',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        location.reload();
                    }
                },
            });
            e.preventDefault();
        });
    });
</script>
@endsection
