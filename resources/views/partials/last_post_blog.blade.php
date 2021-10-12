<section class="blog-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>وبلاگ ما</h2>
        </div>

        <div class="row">
            @foreach($blog_posts as $item)
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="single-blog-post">
                    <div class="post-image">
                        <a href="{{route('single_mag' , $item->slug)}}" class="d-block"><img src="/uploads/blog/thumbnail/{{$item->thumbnail ?? ""}}" alt="فروشگاه آرمان"></a>
                    </div>

                    <div class="post-content">
                        <h3><a href="{{route('single_mag' , $item->slug)}}">{{$item->title ?? ""}}</a></h3>
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
        </div>
    </div>
</section>
