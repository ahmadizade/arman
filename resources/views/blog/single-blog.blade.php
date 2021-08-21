@extends("layouts.master")
@section("title")
    @if(\Illuminate\Support\Str::length($post->seo_title) > 1)
        <title>{{ $post->seo_title }} - آرمان</title>
    @else
        <title>{{ $post->title ?? '' }} - آرمان</title>
    @endif
    @if(\Illuminate\Support\Str::length($post->seo_description) > 1)
        <meta name="description" content="{{ $post->seo_description }}">
    @endif
    <meta name="robots" content="all">
    @if(\Illuminate\Support\Str::length($post->seo_canonical) > 1)
        <link rel="canonical" href="{{ $post->seo_canonical }}">
    @else
        <link rel="canonical" href="{{ route("single_mag" , ["slug" => $post->slug]) }}">
    @endif
    @if(\Illuminate\Support\Str::length($post->seo_title) > 1)
        <meta property="og:title" content="{{ $post->seo_title }} - آرمان">
    @else
        <meta property="og:title" content="{{ $post->title ?? '' }} - آرمان">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    @if(\Illuminate\Support\Str::length($post->seo_description) > 1)
        <meta property="og:site_name" content="{{ $post->seo_description }}">
    @endif
    <meta property="og:image" content="{{ request()->getSchemeAndHttpHost() . '/uploads/blog/thumbnail' . $post->thumbnail ?? '/img/home/logo.png'}}">
@endsection


@section("content")

    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>مجله آرمان</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>وبلاگ</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Blog Details Area -->
    <section class="blog-details-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="/uploads/blog/thumbnail/{{$post->thumbnail ?? ""}}" alt="{{$post->title ?? "عنوان مجله"}}">
                        </div>

                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li>
                                        <i class="bx bx-folder-open"></i>
                                        <span>دسته </span>
                                        <a href="javascript:void(0)">{{$post->blogCategory->name ?? "ثبت نشده"}}</a>
                                    </li>
                                    <li>
                                        <i class="bx bx-group"></i>
                                        <span>نویسنده</span>
                                        {{$post->author ?? "ثبت نشده"}}
                                    </li>
                                    <li>
                                        <i class="bx bx-calendar"></i>
                                        <span>آخرین به روزرسانی در</span>
                                        {{\Morilog\Jalali\Jalalian::forge($post->created_at)->format("Y/m/d")}}
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-4">
                                <h1 style="font-size: 21px;">{!! $post->title ?? "عنوان مطلب یافت نشد!" !!}</h1>
                            </div>

                            <div class="mt-4">
                                {!! $post->content ?? "متن مطلب یافت نشد!" !!}
                            </div>
                        <div class="article-footer">
                            <div class="article-tags">
                                <span><i class="bx bx-purchase-tag"></i></span>
                                <a href="#">مد</a> ،
                                <a href="#">بازی</a> ،
                                <a href="#">سفر</a>
                            </div>

                            <div class="article-share">
                                <ul class="social">
                                    <li><span>دسته بندی : </span></li>
                                    <li>{{$post->blogCategory->name ?? "ثبت نشده!"}}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="article-author">
                            <div class="author-profile-header"></div>
                            <div class="author-profile">
                                <div class="author-profile-title">
                                    <img src="/img/user1.jpg" class="shadow-sm" alt="تصویر">
                                    <h4>کریس اورویگ</h4>
                                    <span class="d-block">عکاس ، نویسنده ، نویسنده</span>
                                    <p>کریس اورویگ یک عکاس ، نویسنده و نویسنده مشهور است که اشتیاق به هر کاری را انجام می دهد. هویج متن ساختگی تخفیفات بیشتری را افزایش می دهد اما زمان اکتیو را انجام می دهد.</p>
                                </div>
                            </div>
                        </div>

                        <div class="drodo-post-navigation">
                            <div class="prev-link-wrapper">
                                <div class="info-prev-link-wrapper">
                                    <a href="#">
                                            <span class="image-prev">
                                                <img src="/img/blog/blog-img2.jpg" alt="image">
                                                <span class="post-nav-title">قبلی</span>
                                            </span>

                                        <span class="prev-link-info-wrapper">
                                                <span class="prev-title">استراتژی های بازاریابی دیجیتال برای تولید سرب</span>
                                                <span class="meta-wrapper">
                                                    <span class="date-post">2 آبان 1399</span>
                                                </span>
                                            </span>
                                    </a>
                                </div>
                            </div>

                            <div class="next-link-wrapper">
                                <div class="info-next-link-wrapper">
                                    <a href="#">
                                            <span class="next-link-info-wrapper">
                                                <span class="next-title">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                <span class="meta-wrapper">
                                                    <span class="date-post">2 آبان 1399</span>
                                                </span>
                                            </span>

                                        <span class="image-next">
                                                <img src="/img/blog/blog-img3.jpg" alt="image">
                                                <span class="post-nav-title">بعدی</span>
                                            </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="comments-area">
                            <h3 class="comments-title">2 نظر:</h3>

                            <ol class="comment-list">
                                <li class="comment">
                                    <article class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <img src="/img/user1.jpg" class="avatar" alt="تصویر">
                                                <b class="fn">جان جونز </b>
                                                <span class="says">می گوید:</span>
                                            </div>

                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <span>24 آبان 1399 در 10:59 صبح</span>
                                                </a>
                                            </div>
                                        </footer>

                                        <div class="comment-content">
                                            <p>متن ساختگی از سال 1500 به بعد ، متن ساختگی استاندارد صنعت بوده است ، زمانی كه چاپگر ناشناخته نوع گالی را گرفت و آنرا مخلوط كرد تا نمونه نمونه ای بسازد.</p>
                                        </div>

                                        <div class="reply">
                                            <a href="#" class="comment-reply-link">پاسخ</a>
                                        </div>
                                    </article>

                                    <ol class="children">
                                        <li class="comment">
                                            <article class="comment-body">
                                                <footer class="comment-meta">
                                                    <div class="comment-author vcard">
                                                        <img src="/img/user2.jpg" class="avatar" alt="تصویر">
                                                        <b class="fn">استیون اسمیت </b>
                                                        <span class="says">می گوید:</span>
                                                    </div>

                                                    <div class="comment-metadata">
                                                        <a href="#">
                                                            <span>24 آبان 1399 در 10:59 صبح</span>
                                                        </a>
                                                    </div>
                                                </footer>

                                                <div class="comment-content">
                                                    <p>متن ساختگی از سال 1500 به بعد ، متن ساختگی استاندارد صنعت بوده است ، زمانی كه چاپگر ناشناخته نوع گالی را گرفت و آنرا مخلوط كرد تا نمونه نمونه ای بسازد.</p>
                                                </div>

                                                <div class="reply">
                                                    <a href="#" class="comment-reply-link">پاسخ</a>
                                                </div>
                                            </article>

                                            <ol class="children">
                                                <li class="comment">
                                                    <article class="comment-body">
                                                        <footer class="comment-meta">
                                                            <div class="comment-author vcard">
                                                                <img src="/img/user3.jpg" class="avatar" alt="تصویر">
                                                                <b class="fn">سارا تیلور </b>
                                                                <span class="says">می گوید:</span>
                                                            </div>

                                                            <div class="comment-metadata">
                                                                <a href="#">
                                                                    <span>24 آبان 1399 در 10:59 صبح</span>
                                                                </a>
                                                            </div>
                                                        </footer>

                                                        <div class="comment-content">
                                                            <p>متن ساختگی از سال 1500 به بعد ، متن ساختگی استاندارد صنعت بوده است ، زمانی كه چاپگر ناشناخته نوع گالی را گرفت و آنرا مخلوط كرد تا نمونه نمونه ای بسازد.</p>
                                                        </div>

                                                        <div class="reply">
                                                            <a href="#" class="comment-reply-link">پاسخ</a>
                                                        </div>
                                                    </article>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </li>

                                <li class="comment">
                                    <article class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <img src="/img/user4.jpg" class="avatar" alt="تصویر">
                                                <b class="fn">جان دو </b>
                                                <span class="says">می گوید:</span>
                                            </div>

                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <span>24 آبان 1399 در 10:59 صبح</span>
                                                </a>
                                            </div>
                                        </footer>

                                        <div class="comment-content">
                                            <p>متن ساختگی از سال 1500 به بعد ، متن ساختگی استاندارد صنعت بوده است ، زمانی كه چاپگر ناشناخته نوع گالی را گرفت و آنرا مخلوط كرد تا نمونه نمونه ای بسازد.</p>
                                        </div>

                                        <div class="reply">
                                            <a href="#" class="comment-reply-link">پاسخ</a>
                                        </div>
                                    </article>

                                    <ol class="children">
                                        <li class="comment">
                                            <article class="comment-body">
                                                <footer class="comment-meta">
                                                    <div class="comment-author vcard">
                                                        <img src="/img/user1.jpg" class="avatar" alt="تصویر">
                                                        <b class="fn">جیمز اندرسون </b>
                                                        <span class="says">می گوید:</span>
                                                    </div>

                                                    <div class="comment-metadata">
                                                        <a href="#">
                                                            <span>24 آبان 1399 در 10:59 صبح</span>
                                                        </a>
                                                    </div>
                                                </footer>

                                                <div class="comment-content">
                                                    <p>متن ساختگی از سال 1500 به بعد ، متن ساختگی استاندارد صنعت بوده است ، زمانی كه چاپگر ناشناخته نوع گالی را گرفت و آنرا مخلوط كرد تا نمونه نمونه ای بسازد.</p>
                                                </div>

                                                <div class="reply">
                                                    <a href="#" class="comment-reply-link">پاسخ</a>
                                                </div>
                                            </article>
                                        </li>
                                    </ol>
                                </li>
                            </ol>

                            <div class="comment-respond">
                                <h3 class="comment-reply-title">پاسخ دهید</h3>

                                <form class="comment-form">
                                    <p class="comment-notes">
                                        <span id="email-notes">آدرس ایمیل شما منتشر نخواهد شد. </span>
                                        قسمتهای مورد نیاز علامت گذاری شده اند
                                        <span class="required">*</span>
                                    </p>
                                    <p class="comment-form-author">
                                        <label>نام <span class="required">*</span></label>
                                        <input type="text" id="author" placeholder="اسم شما*" name="author" required="required">
                                    </p>
                                    <p class="comment-form-email">
                                        <label>ایمیل <span class="required">*</span></label>
                                        <input type="email" id="email" placeholder="ایمیل شما*" name="email" required="required">
                                    </p>
                                    <p class="comment-form-url">
                                        <label>سایت اینترنتی</label>
                                        <input type="url" id="url" placeholder="سایت اینترنتی" name="url">
                                    </p>
                                    <p class="comment-form-comment">
                                        <label>اظهار نظر</label>
                                        <textarea name="comment" id="comment" cols="45" placeholder="نظر شما..." rows="5" maxlength="65525" required="required"></textarea>
                                    </p>
                                    <p class="comment-form-cookies-consent">
                                        <input type="checkbox" value="yes" name="wp-comment-cookies-consent" id="wp-comment-cookies-consent">
                                        <label for="wp-comment-cookies-consent">نام ، ایمیل و وب سایت من را برای دفعه بعدی که نظر می دهم در این مرورگر ذخیره کنید.</label>
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" name="submit" id="submit" class="submit" value="ارسال نظر">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <section class="widget widget_search">
                            <h3 class="widget-title">جستجو کردن</h3>

                            <form class="search-form">
                                <label>
                                    <span class="screen-reader-text">جستجو برای:</span>
                                    <input type="search" class="search-field" placeholder="جستجو کردن...">
                                </label>
                                <button type="submit"><i class="bx bx-search-alt"></i></button>
                            </form>
                        </section>

                        <section class="widget widget_drodo_posts_thumb">
                            <h3 class="widget-title">پست های محبوب</h3>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <span>17 آبان 1399</span>
                                    <h4 class="title usmall"><a href="#">داده های تحصیلات عالی اطراف</a></h4>
                                </div>

                                <div class="clear"></div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <span>17 آبان 1399</span>
                                    <h4 class="title usmall"><a href="#">نرخ تبدیل بهینه سازی قیف فروش</a></h4>
                                </div>

                                <div class="clear"></div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg3" role="img"></span>
                                </a>
                                <div class="info">
                                    <span>17 آبان 1399</span>
                                    <h4 class="title usmall"><a href="#">داده های تجاری در حال تغییر انرژی در جهان است</a></h4>
                                </div>

                                <div class="clear"></div>
                            </article>
                        </section>

                        <section class="widget widget_categories">
                            <h3 class="widget-title">دسته بندی ها</h3>

                            <ul>
                                <li><a href="#">طراحی <span class="post-count">(03)</span></a></li>
                                <li><a href="#">سبک زندگی <span class="post-count">(05)</span></a></li>
                                <li><a href="#">متن <span class="post-count">(10)</span></a></li>
                                <li><a href="#">دستگاه <span class="post-count">(08)</span></a></li>
                                <li><a href="#">نکات <span class="post-count">(01)</span></a></li>
                            </ul>
                        </section>

                        <section class="widget widget_tag_cloud">
                            <h3 class="widget-title">برچسب های محبوب</h3>

                            <div class="tagcloud">
                                <a href="#">تجارت <span class="tag-link-count">(3)</span></a>
                                <a href="#"> طراحی <span class="tag-link-count">(3)</span></a>
                                <a href="#">متن<span class="tag-link-count">(2)</span></a>
                                <a href="#"> مد <span class="tag-link-count">(2)</span></a>
                                <a href="#"> مسافرت <span class="tag-link-count">(1)</span></a>
                                <a href="#"> هوشمند <span class="tag-link-count">(1)</span></a>
                                <a href="#"> بازاریابی <span class="tag-link-count">(1)</span></a>
                                <a href="#"> نکات <span class="tag-link-count">(2)</span></a>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Details Area -->

@endsection

@section("extra_js")

@endsection
