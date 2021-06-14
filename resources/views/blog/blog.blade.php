@extends("layouts.master")
@section("title")
    <title>بلاگ | فروشگاه سی و سه</title>
@endsection

@section("content")
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">

            <div class="row mt-5 pt-5">
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-3">
                    <div class="row">
                        @if (isset($post))
                            @foreach ($post as $item)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="post-card">
                                <div class="post-thumbnail">
                                    <a href="{{route('single_mag' , $item->slug)}}">
                                        <img src="/uploads/blog/thumbnail/{{$item->thumbnail}}" alt="{{$item->title}}">
                                    </a>
                                    <span class="post-tag">مقاله</span>
                                </div>
                                <div class="post-title">
                                    <a href="{{route('single_mag' , $item->slug)}}">
                                        {{$item->title}}
                                    </a>
                                    <p class="text-muted text-right" style="font-size: 9px">
                                        CioCe.ir
                                    </p>
                                    <p class="text-muted text-right" style="font-size: 9px">
                                        {{$item->author}}
                                    </p>

                                    <span class="post-date">
                                        {{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}
                                    </span>
                                </div>
                            </div>
                        </div>
                            @endforeach
                                <div class="d-flex justify-content-end">{{ $post->links() }}</div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="pagination">
                                <a href="#" class="prev"><i class="mdi mdi-chevron-double-right"></i></a>
                                <a href="#">1</a>
                                <a href="#" class="active-page">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">...</a>
                                <a href="#">7</a>
                                <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                            </div>
                        </div>
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
