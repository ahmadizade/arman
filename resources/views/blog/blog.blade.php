@extends("layouts.master")
@section("title")
    <title>وبلاگ | فروشگاه آرمان</title>
    <meta name="description" content="صفحه اصلی وبلاگ | فروشگاه آرمان">
    <meta name="robots" content="all">
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

    <!-- Start Blog Area -->
    <section class="blog-area ptb-70">
        <div class="container">
            <div class="row">
                @if(isset($post))
                    @foreach($post as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{route('single_mag' , $item->slug)}}" class="d-block"><img src="/uploads/blog/thumbnail/{{$item->thumbnail ?? ""}}" alt="{{$item->title ?? "عنوان مجله"}}"></a>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{route('single_mag' , $item->slug)}}">{{$item->title ?? "عنوان ثبت نشده است!"}}</a></h3>
                                    <ul class="post-meta align-items-center d-flex">
                                        <li>
                                            <div class="flex align-items-center">
                                                <span>دسته بندی : </span>
                                                <span class="text-muted">{{$item->blogCategory->name ?? "ثبت نشده"}}</span>
                                            </div>
                                        </li>
                                        <li>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d")}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Blog Area -->

@endsection

@section("extra_js")

@endsection
