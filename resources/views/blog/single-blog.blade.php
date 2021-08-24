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
{{--                            <div class="article-tags">--}}
{{--                                <span><i class="bx bx-purchase-tag"></i></span>--}}
{{--                                <a href="#">مد</a> ،--}}
{{--                                <a href="#">بازی</a> ،--}}
{{--                                <a href="#">سفر</a>--}}
{{--                            </div>     --}}
                            <div class="article-tags">
                                <span><i class="bx bx-purchase-tag"></i></span>
                                <a href="#">انتشار :</a>
                                <a href="#">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format("Y/m/d")}}</a>
                            </div>

                            <div class="article-share">
                                <ul class="social">
                                    <li><span>دسته بندی : </span></li>
                                    <li>{{$post->blogCategory->name ?? "ثبت نشده!"}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
{{--                        <section class="widget widget_search">--}}
{{--                            <h3 class="widget-title">جستجو کردن</h3>--}}

{{--                            <form class="search-form">--}}
{{--                                <label>--}}
{{--                                    <span class="screen-reader-text">جستجو برای:</span>--}}
{{--                                    <input type="search" class="search-field" placeholder="جستجو کردن...">--}}
{{--                                </label>--}}
{{--                                <button type="submit"><i class="bx bx-search-alt"></i></button>--}}
{{--                            </form>--}}
{{--                        </section>--}}

                        <section class="widget widget_drodo_posts_thumb">
                            <h3 class="widget-title">پست های محبوب</h3>

                            @if(isset($bestPost))
                                @foreach($bestPost as $item)
                            <article class="item">
                                <a href="{{route('single_mag' , $item->slug)}}" class="thumb">
                                    <span class="fullimage cover" role="img"><img src="/uploads/blog/thumbnail/{{$item->thumbnail ?? ""}}" alt="{{$item->title ?? "عنوان مجله"}}"></span>
                                </a>
                                <div class="info">
                                    <span>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d")}}</span>
                                    <h4 class="title usmall"><a href="{{route('single_mag' , $item->slug)}}">{{$item->title ?? ""}}</a></h4>
                                </div>

                                <div class="clear"></div>
                            </article>
                                @endforeach
                            @endif

                        </section>

                        <section class="widget widget_categories">
                            <h3 class="widget-title">دسته بندی ها</h3>
                            <ul>
                                @if(isset($blog_categories))
                                    @foreach($blog_categories as $item)
                                        <li><a href="{{route('single_blog_category',['slug' => $item->slug])}}">{{$item->name}} <span class="post-count">({{count($item->blogPost)}})</span></a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </section>

{{--                        <section class="widget widget_tag_cloud">--}}
{{--                            <h3 class="widget-title">برچسب های محبوب</h3>--}}

{{--                            <div class="tagcloud">--}}
{{--                                @if(isset($blog_tags))--}}
{{--                                    @foreach($blog_tags as $item)--}}
{{--                                        <a href="#">{{$item->name}}</a>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </section>--}}
                    </aside>
                </div>
            </div>
        </div>
        @include('partials.last_post_blog')
    </section>
    <!-- End Blog Details Area -->

@endsection

@section("extra_js")

@endsection
