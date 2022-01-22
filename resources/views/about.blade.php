@extends("layouts.master")

@section("title")
    <title>{{$setting->aboutus_page_title ?? "فروشگاه آرمان ماسک"}}</title>
    <meta name="description" content="{{ $setting->aboutus_page_description ?? ''}}">
@endsection

@section("content")
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>درباره ما</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li><a href="{{route('contact')}}">تماس با ما</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start About Area -->
    <section class="about-area ptb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        @if(isset($setting))
                            <span class="sub-title">{!! $setting->about_us_title ?? "ما به بهترین کیفیت اعتقاد داریم" !!}</span>
                            <p class="text-justify">{!! $setting->about_us_desc ?? "" !!}</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <div id="5523301755"><script type="text/JavaScript" src="https://www.aparat.com/embed/NKtFO?data[rnddiv]=5523301755&data[responsive]=yes&data[title]=armanmask.ir&&recom=none"></script></div>
{{--                        <img src="/img/about/about-img1.jpg" alt="تصویر">--}}

                        <div class="shape">
                            <img src="/img/about/about-shape1.png" alt="تصویر">
                            <img src="/img/about/about-shape2.png" alt="تصویر">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->

@endsection
