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
                        <span class="sub-title">ما به بهترین کیفیت اعتقاد داریم</span>
{{--                        <h2>به دکتر اودو خوش آمدید! هدف از خدمات شما ایجاد آرمان ما است. بنابراین ما همیشه می خواهیم در کنار شما باشیم ....</h2>--}}
                        <p class="text-justify">شرکت آرمان ماسک در سال ۱۳۶۳ فعالیت خود را با تولید ماسک‌های کاسه‌ای فنردار آغاز کرد. کارخانه آرمان ماسک با یک دستگاه دست ساز با تکنولوژی قالب حرارتی و پارچه سوزنی آهار خورده، شروع به فعالیت کرد و رفته رفته با تکنولوژی‌های جدید دستگاه‌های مدرن جایگزین شدند. کارخانه آرمان ماسک با بیش از ۵۰ نفر پرسنل در شهرستان کلاردشت استان مازندران گاهی در سه شیفت مشغول به کار است تا در این دوره بسیار مهم و حیاتی نقش خود را در مبارزه با ویروس کرونا ایفا کند.
                            شرکت آرمان ماسک دارای علامت سیب سلامت از سازمان غذا و‌ دارو می‌باشد و همچنین دارای گواهینامه بین المللی ISO است. تمامی محصولات شرکت آرمان ماسک در سطوح کیفیتی بین المللی با استانداردهای روز تولید می‌شوند.</p>
{{--                        <div class="quotes-box">--}}
{{--                            <span>پیامی از بنیانگذاران ما</span>--}}
{{--                            <p>ما توانسته ایم بستری را ایجاد کنیم که مشتری ها هر وقت بخواهند می توانند دستشان را بگیرند. هدف ما همیشه خدمت شماست.</p>--}}
{{--                        </div>--}}
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
