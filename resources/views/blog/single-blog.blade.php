@extends("layouts.master")
@section("title")
    @if(\Illuminate\Support\Str::length($post->seo_title) > 1)
        <title>{{ $post->seo_title }} - سی و سه</title>
    @else
        <title>{{ $post->title ?? '' }} - سی و سه</title>
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
        <meta property="og:title" content="{{ $post->seo_title }} - سی و سه">
    @else
        <meta property="og:title" content="{{ $post->title ?? '' }} - سی و سه">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    @if(\Illuminate\Support\Str::length($post->seo_description) > 1)
        <meta property="og:site_name" content="{{ $post->seo_description }}">
    @endif
    <meta property="og:image" content="{{ request()->getSchemeAndHttpHost() . '/uploads/blog/thumbnail' . $post->thumbnail ?? '/img/home/logo.png'}}">
@endsection


@section("content")
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">

            <!-- Start title - breadcrumb -->
            <div class="title-breadcrumb-special dt-sl">
                <div class="breadcrumb dt-sl">
                    <nav>
                        <a href="{{route('home')}}">خانه</a>
                        <a href="{{route('mag')}}">خبرنامه</a>
                        <a href="#">{{$post->title}}</a>
                    </nav>
                </div>
                <div class="title-page dt-sl">
                    <h1>{{$post->title}}</h1>
                </div>
                <div class="post-rating">
                    <div class="star-rate" data-toggle="tooltip" data-placement="top" data-html="true" title=""
                         data-original-title="<b>۴</b> از ۴ رای">
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                    </div>
                </div>
            </div>
            <!-- End title - breadcrumb -->

            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-3">
                    <div class="content-page">
                        <div class="content-desc dt-sn dt-sl">
                            <header class="entry-header dt-sl mb-3">
                                <div class="post-meta date">
                                    <i class="mdi mdi-calendar-month"></i>{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format("Y/m/d") }}
                                </div>
                                <div class="post-meta author">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ارسال شده توسط : <a href="#">{{$post->author}}</a>
                                </div>
{{--                                <div class="post-meta category">--}}
{{--                                    <i class="mdi mdi-folder"></i>--}}
{{--                                    <a href="#">دسته‌بندی نشده</a> ، <a href="#">کسب و کار آنلاین</a> ، <a--}}
{{--                                        href="#">معرفی کتاب</a>--}}
{{--                                </div>--}}
                                <div class="post-meta category">
                                    <i class="mdi mdi-eye"></i>
                                    {{$post->view}} بازدید
                                </div>
                            </header>
                            <div class="post-thumbnail dt-sl">
                                <img src="/uploads/blog/image/{{$post->image}}" alt="{{$post->title}}">
                            </div>
                           <div class="mt-4">{!! $post->content !!}</div>
                        </div>
                    </div>
                    <div class="comments-area dt-sl my-3">
                        <div class="dt-sn">
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
                                <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                            @endif
                            <p class="mt-4 mb-4">نظرات خود در مورد این مطلب را به اشتراک بگذارید</p>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-ui blog-comment">
                                        <form method="post" action="{{route('new_single_mag_comment')}}">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-row-title mb-2">عنوان نظر شما (اجباری)
                                                    </div>
                                                    <div class="form-row">
                                                        <input class="input-ui pr-2" type="text" name="title"
                                                               placeholder="عنوان نظر خود را بنویسید">
                                                    </div>
                                                </div>
                                                <input name="post_id" type="hidden" readonly value="{{$post->id}}">
                                                <div class="col-12 mt-3 mb-3">
                                                    <div class="form-row-title mb-2">متن نظر شما (اجباری)</div>
                                                    <div class="form-row">
                                                            <textarea class="input-ui pr-2 pt-2" rows="5" name="desc"
                                                                      placeholder="متن خود را بنویسید"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 px-3">
                                                    <p class="d-block">با “ثبت نظر” موافقت خود را با <a href="#"
                                                                                                        class="border-bottom-dt" target="_blank">قوانین
                                                            انتشار محتوا</a> در سی و سه اعلام می‌کنم.</p>
                                                    <button type="submit" class="btn btn btn-primary px-3">
                                                        ثبت نظر
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (isset($comment))
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 mt-5 dt-sl">
                                <h2>نظرات کاربران</h2>
                                <p class="count-comment">{{count($comment)}} نظر</p>
                            </div>
                            <ol class="comment-list">
                                <!-- #comment-## -->
                                @foreach ($comment as $item)
                                <li>
                                    <div class="comment-body mt-3">
                                        <div class="row">
                                            <div class="col-12 comment-content">
                                                <div class="comment-author">
                                                    توسط {{$item->name}} در تاریخ {{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}
                                                </div>
                                                <p class="mb-4">عنوان پیام : {{$item->title}}</p>
                                                <p>{{$item->desc}}</p>

{{--                                                <div class="footer">--}}
{{--                                                    <div class="comments-likes">--}}
{{--                                                        آیا این نظر برایتان مفید بود؟--}}
{{--                                                        <button class="btn-like" data-counter="۱۱">بله--}}
{{--                                                        </button>--}}
{{--                                                        <button class="btn-like" data-counter="۶">خیر--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <!-- #comment-## -->
                            </ol>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-3 sidebar sticky-sidebar">
                    <div class="widget-posts dt-sn dt-sl mb-3">
                        <div class="title-sidebar dt-sl mb-3">
                            <h3>جدیدترین نوشته ها</h3>
                        </div>
                        <div class="content-sidebar dt-sl">
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-thumb">
                                        <a href="#" class="img-holder"
                                           style="background-image: url('/img/post-thumbnail/1.png')"></a>
                                    </div>
                                    <p class="title">
                                        <a href="#">سایت و فروشگاهتو طراحی کن</a>
                                    </p>
                                    <div class="item-meta">
                                        <span class="time">۱۰ مرداد ۱۳۹۸</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-thumb">
                                        <a href="#" class="img-holder"
                                           style="background-image: url('/img/post-thumbnail/2.png')"></a>
                                    </div>
                                    <p class="title">
                                        <a href="#">امنیت سایتت رو تامین کن</a>
                                    </p>
                                    <div class="item-meta">
                                        <span class="time">۱۰ مرداد ۱۳۹۸</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-thumb">
                                        <a href="#" class="img-holder"
                                           style="background-image: url('/img/post-thumbnail/3.png')"></a>
                                    </div>
                                    <p class="title">
                                        <a href="#">اینستاگرام را پول ساز کن</a>
                                    </p>
                                    <div class="item-meta">
                                        <span class="time">۱۰ مرداد ۱۳۹۸</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-thumb">
                                        <a href="#" class="img-holder"
                                           style="background-image: url('/img/post-thumbnail/4.png')"></a>
                                    </div>
                                    <p class="title">
                                        <a href="#">سایت خودت رو چندزبانه کن</a>
                                    </p>
                                    <div class="item-meta">
                                        <span class="time">۱۰ مرداد ۱۳۹۸</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dt-sn dt-sl mb-3">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-1">
                            <h2>دسته ها</h2>
                        </div>
                        <ul class="category-list">
                            <li><a href="#">بهینه سازی</a></li>
                            <li><a href="#">برنامه نویسی</a></li>
                            <li><a href="#">طراحی سایت</a>
                                <ul>
                                    <li><a href="#">وردپرس</a></li>
                                    <li><a href="#">پلاگین نویسی</a></li>
                                </ul>
                            </li>
                            <li><a href="#">گرافیک</a></li>
                        </ul>
                    </div>
                    <div class="dt-sn dt-sl">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-1">
                            <h2>برچسبها</h2>
                        </div>
                        <ul class="tag-list">
                            <li><a href="#">بهینه سازی</a></li>
                            <li><a href="#">برنامه نویسی</a></li>
                            <li><a href="#">طراحی سایت</a></li>
                            <li><a href="#">وردپرس</a></li>
                            <li><a href="#">پلاگین نویسی</a></li>
                            <li><a href="#">گرافیک</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!-- End main-content -->
@endsection

@section("extra_js")

@endsection
