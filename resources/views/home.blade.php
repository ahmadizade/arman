@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection



@extends("partials.header")

@section("content")


    {{--    Top Picture--}}
    <div class="site-blocks-cover" style="background-image:url({{url('/images/samin/e-commerce.jpg')}})" data-aos="fade"
         id="home-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 mt-lg-5 text-center">
                    <div class="single-text owl-carousel">
                        <div class="slide">
                            <h1 class="text-uppercase" data-aos="fade-up">Iranian Barter</h1>
                            <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">www.Bazarti.com </p>
                            <div data-aos="fade-up" data-aos-delay="100">
                            </div>
                        </div>

                        <div class="slide">
                            <h1 class="text-uppercase" data-aos="fade-up">Swapping AND TradeUp</h1>
                            <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">No Money! So We Have a Healthy
                                Earth </p>
                        </div>

                        <div class="slide">
                            <h1 class="text-uppercase" data-aos="fade-up">Together!</h1>
                            <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">We Think Of Globalization</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a href="#next" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
        </a>
    </div>




    {{--کیف پول--}}
    <div class="site-section" id="next">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="">
                    <figure class="circle-bg">
                        <img src="images/product/h1.jpg" alt="Bazar Tahator Iranian"
                             class="img-fluid samin-pages mb-4"></figure>
                    <h3 class="card-title">ثمین تخفیف</h3>
                    <p>با هر پرداخت %10 شارژ اضافه میگیری</p>
                </div>
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="100">
                    <img src="images/product/h2.jpg" alt="Bazar Tahator Iranian"
                         class="img-fluid samin-pages mb-4">
                    <h3 class="card-title">ثمین سررسید</h3>
                    <p>الان بخر 6 ماه دیگه پول بده</p>
                </div>
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="200">
                    <img src="images/product/h3.jpg"
                         alt="Bazar Tahator Iranian" class="img-fluid samin-pages mb-4">
                    <h3 class="card-title">ثمین تعویض</h3>
                    <p>بازار تهاتر ایرانیان</p>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="">
                    <img src="images/flaticon-svg/svg/001-wallet.svg" alt="Bazar Tahator Iranian"
                         class="img-fluid w-25 mb-4">
                    <h3 class="card-title">شارژ کیف پول</h3>
                    <p>10% افزایش اعتبار با شارژ کیف پول</p>
                </div>
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="100">
                    <img id="add-store-btn" src="images/flaticon-svg/svg/004-cart.svg" alt="Bazar Tahator Iranian"
                         class="img-fluid pointer-event w-25 mb-4">
                    <h3 class="card-title">ثبت آنلاین فروشگاه</h3>
                    <p>ارتباط بین فروشنده و خریدار بدون واسته</p>
                </div>
                <div class="col-md-4 text-center myfont" data-aos="fade-up" data-aos-delay="200">
                    <img src="images/flaticon-svg/svg/006-credit-card.svg"
                         alt="Bazar Tahator Iranian" class="img-fluid w-25 mb-4">
                    <h3 class="card-title">ثمین کارت ها</h3>
                    <p>آشنایی بیشتر با انواع ثمین کارت</p>
                </div>
            </div>
        </div>
    </div>

    {{--    موبایل Home page--}}
    <div class="container overflow-hidden">
        <div class="row text-center">
            <div class="col-md-12 text-center myfont aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                <img src="images/samin/mobile-trans.png" alt="Bazar Tahator Iranian" class="img-fluid mb-4">
            </div>
        </div>
    </div>
    {{--    موبایل Home page--}}


    {{--تبلیق فروشگاه ها--}}
    <div class="third-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4 text-center myfont aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <img src="images/product/mba4.jpg" alt="Bazar Tahator Iranian" class="img-fluid w-100 mb-4">
                    <h3 class="card-title">فروشگاه ساسان</h3>
                    <p>ولنجک، آصف، انتهای خیابان ساسان</p>
                    <p class="text-primary">021-2427635</p>
                </div>


                {{--                 <div class="col-md-4 text-center myfont aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">--}}
                {{--                    <img src="images/samin/mobile-trans.png" alt="Bazar Tahator Iranian" class="img-fluid w-100 mb-4">--}}
                {{--                </div>--}}


                <div class="col-md-4 text-center myfont aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <img src="images/product/mmba44.jpg" alt="Bazar Tahator Iranian" class="img-fluid w-100 mb-4">
                    <h3 class="card-title">فروشگاه کاوان</h3>
                    <p>شهرک غرب، ایرانزمین، گلستان پنجم</p>
                    <p class="text-primary">021-8357495</p>
                </div>


            </div>

        </div>
    </div>
    {{--تبلیق فروشگاه ها--}}

    {{--بازار مبل ایران--}}
    <div id="fourth" class="my-5">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-center my-5">
                <img src="images/product/1 (1).png" alt="Bazar Tahator Iranian" class="special-commerc img-fluid w-75">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-center">
                <div class="fr__prize__inner text-center mt-5">
                    <h4 class="text-primary">بزرگترین مرکز فروش مبل در ایران و خاورمیانه</h4>
                    <h5>بیش از 400 فروشگاه فعال</h5>
                    <h4>بازار بزرگ مبل ایران</h4>
                    <a class="fr__btn" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    {{--بازار مبل ایران--}}


    {{--        مبلمان slider--}}
    <div class="container mt-5 overflow-hidden">
        <div class="row">
            <div class="owl-container">
                <div id="owl-food" class="owl-carousel owl-theme">
                    <div class="slider-desc text-center overflow-hidden">
                        <div class="item"><img src="{{url('../images/product/2 (1).jpg')}}" alt="Owl Image">
                        </div>
                        <div class="price-box">
                            <p>فروشگاه کوهیار ایرانیان</p>
                            <del class="text-muted">432090</del>
                            <span class="badge badge-danger">20%</span>
                            <p class="text-danger">298,231</p>
                        </div>
                    </div>
                    <div class="slider-desc text-center overflow-hidden">
                        <div class="item"><img src="{{url('../images/product/8 (1).jpg')}}" alt="Owl Image">
                        </div>
                        <div class="price-box">
                            <p>فروشگاه الیوتی</p>
                            <del class="text-muted">432090</del>
                            <span class="badge badge-danger">18%</span>
                            <p class="text-danger">484,000</p>
                        </div>
                    </div>
                    <div class="slider-desc text-center overflow-hidden">
                        <div class="item"><img src="{{url('../images/product/5 (2).jpg')}}" alt="Owl Image">
                        </div>
                        <div class="price-box">
                            <p>فروشگاه کیان</p>
                            <del class="text-muted">600,000</del>
                            <span class="badge badge-danger">21%</span>
                            <p class="text-danger">540,000</p>
                        </div>
                    </div>
                    <div class="slider-desc text-center overflow-hidden">
                        <div class="item"><img src="{{url('../images/product/1.jpg')}}" alt="Owl Image">
                        </div>
                        <div class="price-box">
                            <p>فروشگاه نگین</p>
                            <del class="text-muted">590,000</del>
                            <span class="badge badge-danger">23%</span>
                            <p class="text-danger">440,000</p>
                        </div>
                    </div>
                    <div class="slider-desc text-center overflow-hidden">
                        <div class="item"><img src="{{url('../images/product/9.jpg')}}" alt="Owl Image">
                        </div>
                        <div class="price-box">
                            <p>پاساژ برلیان</p>
                            <del class="text-muted">440,000</del>
                            <span class="badge badge-danger">23%</span>
                            <p class="text-danger">389,000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--        مبلمان slider--}}



    {{--کفش--}}
    <div class="container mt-5 overflow-hidden">
        <div class="row align-items-center justify-content-center">
            <div class="col-xs-12 my-5">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">کیف و کفش</h2>
                    <p>با بیش از 114 فروشگاه فعال</p>
                </div>
            </div>
        </div>
        {{--ساعت--}}
        <div class="owl-container">
            <div id="owl-watch" class="owl-carousel owl-theme">


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/shoes/p1.jpg')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه سالار</p>
                        <del class="text-muted">390,000</del>
                        <span class="badge badge-danger">19%</span>
                        <p class="text-danger">340,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/shoes/p4.jpg')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه سالار</p>
                        <del class="text-muted">490,000</del>
                        <span class="badge badge-danger">25%</span>
                        <p class="text-danger">380,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/shoes/p2.jpg')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>کفش ملی (هفت تیر)</p>
                        <del class="text-muted">190,000</del>
                        <span class="badge badge-danger">15%</span>
                        <p class="text-danger">120,000</p>
                    </div>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/shoes/p3.jpg')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>کفش ملی (ولیعصر)</p>
                        <del class="text-muted">170,000</del>
                        <span class="badge badge-danger">18%</span>
                        <p class="text-danger">145,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/shoes/p4.jpg')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>کفش ملی (ولیعصر)</p>
                        <del class="text-muted">170,000</del>
                        <span class="badge badge-danger">18%</span>
                        <p class="text-danger">145,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/shoes/p5.jpg')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>کفش ملی (ولیعصر)</p>
                        <del class="text-muted">170,000</del>
                        <span class="badge badge-danger">18%</span>
                        <p class="text-danger">145,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/shoes/p6.jpg')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>چرم مشهد (ونک)</p>
                        <del class="text-muted">184,000</del>
                        <span class="badge badge-danger">18%</span>
                        <p class="text-danger">120,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--کفش--}}


    {{--ساعت--}}
    <div class="container mt-5 overflow-hidden">
        <div class="row align-items-center justify-content-center">
            <div class="col-xs-12 my-5">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">ساعت و دستبند</h2>
                    <p>با ثمین تخفیف می توانید از تمام کالا ها، با تخفیف های باور نکردنی بهرهمند شوید</p>
                </div>
            </div>
        </div>
        {{--ساعت--}}
        <div class="owl-container">
            <div id="owl-watch" class="owl-carousel owl-theme">


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/watch/product-2-copyright-660x660.webp')}}">
                    </div>
                    <div class="price-box">
                        <p>لابراسکی</p>
                        <del class="text-muted">1,490,000</del>
                        <span class="badge badge-danger">25%</span>
                        <p class="text-danger">1,380,000</p>
                    </div>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/watch/product-4-copyright-660x660.webp')}}">
                    </div>
                    <div class="price-box">
                        <p>الکیواسی شعبه ولنجک</p>
                        <del class="text-muted">2,990,000</del>
                        <span class="badge badge-danger">30%</span>
                        <p class="text-danger">2,460,000</p>
                    </div>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/watch/product-5-copyright-660x660.webp')}}">
                    </div>
                    <div class="price-box">
                        <p>کولیدور</p>
                        <del class="text-muted">760,000</del>
                        <span class="badge badge-danger">17%</span>
                        <p class="text-danger">630,000</p>
                    </div>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/watch/product-6-copyright-660x660.webp')}}">
                    </div>
                    <div class="price-box">
                        <p>زمان</p>
                        <del class="text-muted">3,760,000</del>
                        <span class="badge badge-danger">28%</span>
                        <p class="text-danger">2,930,000</p>
                    </div>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/watch/product-7-copyright-660x660.webp')}}">
                    </div>
                    <div class="price-box">
                        <p>برندلی</p>
                        <del class="text-muted">1,960,000</del>
                        <span class="badge badge-danger">38%</span>
                        <p class="text-danger">1,130,000</p>
                    </div>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/watch/product-8-copyright-150x150.png')}}">
                    </div>
                    <div class="price-box">
                        <p>ویولت الاهیه</p>
                        <del class="text-muted">4,160,000</del>
                        <span class="badge badge-danger">29%</span>
                        <p class="text-danger">3,570,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--ساعت--}}


    {{--            لباس زنانه--}}
    <div class="container mt-5 overflow-hidden">
        <div class="row align-items-center justify-content-center">
            <div class="col-xs-12 my-5">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">لباس زنانه</h2>
                    <p>با بیش از 600 فروشگاه فعال در عرصه پوشاک</p>
                </div>
            </div>
        </div>
        <div class="owl-container">
            <div id="owl-demo-1" class="owl-carousel owl-theme">

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a3.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه نگار</p>
                        <del class="text-muted">420,000</del>
                        <span class="badge badge-danger">38%</span>
                        <p class="text-danger">290,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a4.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه تندیس</p>
                        <del class="text-muted">320,000</del>
                        <span class="badge badge-danger">25%</span>
                        <p class="text-danger">270,000</p>
                    </div>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a5.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه کابریس</p>
                        <del class="text-muted">170,000</del>
                        <span class="badge badge-danger">15%</span>
                        <p class="text-danger">150,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a6.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه جاست انجل</p>
                        <del class="text-muted">420,000</del>
                        <span class="badge badge-danger">35%</span>
                        <p class="text-danger">375,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/g1.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه مارکت پارس</p>
                        <del class="text-muted">640,000</del>
                        <span class="badge badge-danger">45%</span>
                        <p class="text-danger">428,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a3.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه پارسیان</p>
                        <del class="text-muted">410,000</del>
                        <span class="badge badge-danger">25%</span>
                        <p class="text-danger">325,000</p>
                    </div>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/product/a3.png')}}" alt="Owl Image">
                    </div>
                    <div class="price-box">
                        <p>فروشگاه پارالل</p>
                        <del class="text-muted">1,100,000</del>
                        <span class="badge badge-danger">51%</span>
                        <p class="text-danger">499,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--            لباس زنانه--}}

    {{--خدمات والپیپر--}}
    <div class="col-xs-12 my-5">
        <div class="section__title--2 text-center">
            <h2 class="title__line">ثمین تخفیف و خدمات</h2>
            <p>با ثمین تخفیف می توانید از تمام خدمات داخل سایت تهاتر ایرانیان، با تخفیف های باور نکردنی بهرهمند شوید</p>
        </div>
    </div>

    <div class="site-blocks-cover w-100 h-75" style="background-image:url({{url('/images/product/100.jpg')}})"
         data-aos="fade">
    </div>

    <

    {{--             خدمات منزل--}}
    <div class="container mt-5 overflow-hidden">
        <div class="row align-items-center justify-content-center">
            <div class="col-xs-12 my-5">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">خدمات منزل</h2>
                    <p>با بیش از 1400 شرکت و افراد فعال در عرصه خدمات منزل</p>
                </div>
            </div>
        </div>
        <div class="owl-container">
            <div id="home-service" class="owl-carousel owl-theme">


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_light_fixtures.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">36%</span>
                    </div>
                    <p class="mt-1 text-danger">برق و سیم کشی</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_alias_accent_wall_painting.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">16%</span>
                    </div>
                    <p class="mt-1 text-danger">نقاشی ساختمان</p>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_mount_tv.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">19%</span>
                    </div>
                    <p class="mt-1 text-danger">نصب و جابجایی</p>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_hanging_pictures_shelves.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">29%</span>
                    </div>
                    <p class="mt-1 text-danger">طراحی داخلی</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_furniture_assembly.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">30%</span>
                    </div>
                    <p class="mt-1 text-danger">تعمیر و تعویض</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_other_electrical.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">30%</span>
                    </div>
                    <p class="mt-1 text-danger">خدمات تلفن</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/service_vacation_rental_cleaning.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">17%</span>
                    </div>
                    <p class="mt-1 text-danger">طراحی داخلی</p>
                </div>


            </div>
        </div>
    </div>
    {{--             خدمات منزل--}}



    {{--             خدمات ساختمان--}}
    <div class="container mt-5 overflow-hidden">
        <div class="row align-items-center justify-content-center">
            <div class="col-xs-12 my-5">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">خدمات ساختمانی</h2>
                    <p>با بیش از 900 بنگاه، شرکت و افراد فعال در عرصه خدمات ساختمانی</p>
                </div>
            </div>
        </div>
        <div class="owl-container text-center">
            <div id="apartment-service" class="owl-carousel owl-theme">


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/door-1.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">36%</span>
                    </div>
                    <p class="mt-1 text-danger">درب و پنجره</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/cold-1.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">16%</span>
                    </div>
                    <p class="mt-1 text-danger">نصب و تعمیر کولر</p>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/heat-1.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">19%</span>
                    </div>
                    <p class="mt-1 text-danger">نصب و تعمیر گاز</p>
                </div>


                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/cabinet.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">29%</span>
                    </div>
                    <p class="mt-1 text-danger">نصب و تعمیر کابینت</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img
                            src="{{url('../images/services/hood-1.jpg')}}"
                            alt="Owl Image">
                        <span class="product-sale-top">30%</span>
                    </div>
                    <p class="mt-1 text-danger">ایزوگام</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/moket-1.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">30%</span>
                    </div>
                    <p class="mt-1 text-danger">شستشوی و نصب موکت</p>
                </div>

                <div class="slider-desc text-center overflow-hidden">
                    <div class="item"><img src="{{url('../images/services/hayat-2.jpg')}}"
                                           alt="Owl Image">
                        <span class="product-sale-top">17%</span>
                    </div>
                    <p class="mt-1 text-danger">حیاط سازی</p>
                </div>
            </div>
        </div>
        <img class="img-fluid" src="{{url('/images/samin/online-shoping-2.jpg')}}">
    </div>
    {{--             خدمات ساختمان--}}


@endsection



@section('extra_js')
    <script src="{{url('/js/app_jquery.js')}}"></script>
@stop
