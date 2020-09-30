
    <div class="site-mobile-menu text-right rtl site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body">
            <img class="mobile_menu_logo mt-2 ml-2" src="{{url('/images/logo/logo_text_200_180.png')}}">
        </div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target ltr" role="banner">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-md-2 text-left">
                    <h1 class="mb-0 mt-3 site-logo"><a href="#" style="font-size: 25px" class="mb-0">Bazarti<span class="text-primary">.</span></a><img style="margin-top: -9px; width: 40px;" src="{{url('/images/logo/logo_100_50.png')}}"></h1>
                </div>

                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">

                            @if(!Auth::check())
                                <li><a href="#" class="nav-link text-primary" data-toggle="modal" data-target="#login-register">ورود / ثبت نام</a></li>
                            @else
                                <li class="has-children">
                                    <a href="#profile" class="nav-link">{{ Auth::user()->mobile }}</a>
                                    <ul class="dropdown text-right rtl">
                                        <li><a class="nav-link text-success"> اعتبار {{ number_format(Auth::user()->credit) }} ریال </a></li>
                                        <li><a href="{{ route("profile_index") }}" class="nav-link">پروفایل</a></li>
                                        <li><a href="{{ route("logout") }}" class="nav-link">خروج</a></li>
                                    </ul>
                                </li>
                            @endif

                            <li><a href="#" class="nav-link text-primary">فروشنده شوید</a></li>

                            {{--<li class="has-children">
                                <a href="#about-section" class="nav-link">خدمات</a>
                                <ul class="dropdown text-right">
                                    <li><a href="#team-section" class="nav-link">منزل و ساختمان</a></li>
                                    <li><a href="#pricing-section" class="nav-link">پزشکی</a></li>
                                    <li><a href="#faq-section" class="nav-link">زیبایی و سلامت</a></li>
                                    <li><a href="#gallery-section" class="nav-link">حقوقی و اداری</a></li>
                                    <li><a href="#services-section" class="nav-link">آموزشی</a></li>
                                    <li><a href="#testimonials-section" class="nav-link text-muted disabled">استخدام و میزکار</a></li>
                                </ul>
                            </li>--}}

               {{--             <li class="has-children">
                                <a href="#">کالا</a>
                                <ul class="dropdown text-right">
                                    <li><a href="#" class="nav-link">کالای دیجیتال</a></li>
                                    <li><a href="#" class="nav-link">پوشاک</a></li>
                                    <li><a href="#" class="nav-link">زیبایی و سلامت</a></li>
                                    <li><a href="#" class="nav-link">خانه و آشپزخانه</a></li>
                                    <li><a href="#" class="nav-link">ورزش و سفر</a></li>
                                </ul>

                            </li>--}}
                            <li class="has-children"><a href="#contact-section" class="nav-link">باشگاه مشتریان</a>
                                <ul class="dropdown text-right">
                                    <li><a href="#" class="nav-link">خبرنامه</a></li>
                                    <li><a href="#" class="nav-link">انواع ثمین کارت</a></li>
                                    <li><a href="#" class="nav-link">دریافت ثمین کارت</a></li>
                                    <li><a href="#" class="nav-link">هواداران استقلال</a></li>
                                    <li><a href="#" class="nav-link">جشنواره</a></li>
                                    <li><a href="#" class="nav-link">قرعه کشی</a></li>
                                </ul>
                            </li>
                            <li><a href="/" class="nav-link">صفحه اصلی<i class="fa fa-home font-20 pl-2 text-primary"></i></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

            </div>
        </div>
    </header>


