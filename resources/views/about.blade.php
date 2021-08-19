@extends("layouts.master")

@section("title")
        <title>آرمان | درباره ما</title>
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
                        <span class="sub-title">ما به کمتر اما بهتر اعتقاد داریم</span>
                        <h2>به دکتر اودو خوش آمدید! هدف از خدمات شما ایجاد آرمان ما است. بنابراین ما همیشه می خواهیم در کنار شما باشیم ....</h2>
                        <p>شرکت ما 25 سال است که صادقانه کار می کند. برای ایجاد تأثیر مثبت در بازارهایی که ما فعالیت می کنیم ، برای توانمندسازی شرکا و جامعه. ما بر رشد و افزودن ارزش به مشتریان تمرکز داریم.</p>
                        <div class="quotes-box">
                            <span>پیامی از بنیانگذاران ما</span>
                            <p>ما توانسته ایم بستری را ایجاد کنیم که مشتری ها هر وقت بخواهند می توانند دستشان را بگیرند. هدف ما همیشه خدمت شماست.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="/img/about/about-img1.jpg" alt="تصویر">

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
