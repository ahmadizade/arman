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
                            <a data-fancybox="gallery" href="/img/products/products-img1.jpg" class="d-block">
                                <img src="/uploads/thumbnail/{{$product->thumbnail}}" alt="{{$product->product_name ?? ""}}">
                            </a>
                        </div>
                        @if(isset($product->slider) && $product->slider[0])
                            @foreach(json_decode($product->slider) as $image)
                                <div class="single-products-details-image">
                                    <a data-fancybox="gallery" href="/img/products/products-img1.jpg" class="d-block">
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
                            <a href="#" class="rating-count">3 بررسی</a>
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
                                            <h3>تعداد نظرات : 4 عدد</h3>

                                            <div class="user-review">
                                                <img src="/img/extra/user.png" alt="تصویر">

                                                <div class="review-rating">
                                                    <div class="review-stars">
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                    </div>

                                                    <span class="d-inline-block">جیمز اندرسون</span>
                                                </div>

                                                <span class="d-block sub-comment">عالی</span>
                                                <p>تم بسیار خوب ساخته شده ، نمی تواند با آن خوشحال باشد. نمی توانید منتظر به روزرسانی های بعدی باشید تا ببینید چه چیز دیگری اضافه می کنند.</p>
                                            </div>

                                            <div class="user-review">
                                                <img src="/img/extra/user.png" alt="تصویر">

                                                <div class="review-rating">
                                                    <div class="review-stars">
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bxs-star"></i>
                                                    </div>

                                                    <span class="d-inline-block">سارا تیلور</span>
                                                </div>
                                                <span class="d-block sub-comment">کیفیت فیلم!</span>
                                                <p>اجرای آن بسیار آسان بود و آنها به سرعت به سوالات اضافی من پاسخ می دهند!</p>
                                            </div>

                                            <div class="user-review">
                                                <img src="/img/extra/user.png" alt="تصویر">

                                                <div class="review-rating">
                                                    <div class="review-stars">
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                    </div>
                                                    <span class="d-inline-block">دیوید وارنر</span>
                                                </div>
                                                <span class="d-block sub-comment">برنامه نویسی کامل!</span>
                                                <p>طراحی خیره کننده ، خدمه بسیار اختصاصی که از ایده های جدید پیشنهادی مشتریان استقبال می کنند ، پشتیبانی خوب.</p>
                                            </div>

                                            <div class="user-review">
                                                <img src="/img/extra/user.png" alt="تصویر">

                                                <div class="review-rating">
                                                    <div class="review-stars">
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star checked"></i>
                                                        <i class="bx bxs-star"></i>
                                                    </div>
                                                    <span class="d-inline-block">کینگ کونگ</span>
                                                </div>
                                                <span class="d-block sub-comment">ویدیوی عالی!</span>
                                                <p>طراحی خیره کننده ، خدمه بسیار اختصاصی که از ایده های جدید پیشنهادی مشتریان استقبال می کنند ، پشتیبانی خوب.</p>
                                            </div>
                                        </div>

                                        <div class="review-form-wrapper">
                                            <h3>فرم نظرات</h3>
                                            <p class="comment-notes">شما می توانید نظر خود در مورد این محصول را اینجا بنویسید</p>

                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="rating">
                                                            <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                                                            <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                                                            <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                                                            <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                                                            <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="نام *">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" placeholder="پست الکترونیک *">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <textarea placeholder="بررسی شما" class="form-control" cols="30" rows="6"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <p class="comment-form-cookies-consent">
                                                            <input type="checkbox" id="test1">
                                                            <label for="test1">نام ، ایمیل و وب سایت من را برای دفعه بعدی که نظر می دهم در این مرورگر ذخیره کنید.</label>
                                                        </p>
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

@endsection
