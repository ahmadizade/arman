<div class="site-mobile-menu text-right rtl site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body">
        <img class="mobile_menu_logo mt-2 ml-2" src="/images/logo/logo_text_200_180.png">
    </div>
</div>

<header class="site-navbar js-sticky-header site-navbar-target ltr" role="banner">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-8 col-md-4 text-left">
                <h1 class="mb-0 mt-3 site-logo"><img style="width: 100px;" class="img-fluid" src="{{url('/images/logo/cioce-tet-logo.png')}}"></h1>
            </div>

            <div class="col-4 col-md-8 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">

                        <li>
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#search-modal">
                                جستجو
                                <span class="fa fa-search font-16 text-muted pl-1"></span></a>
                            </a>
                        </li>
                        @if(!Auth::check())
                            <li><a href="#" class="nav-link text-primary" data-toggle="modal"
                                   data-target="#login-register">ورود / ثبت نام</a></li>
                        @else
                            <li class="has-children">
                                @if(Auth::check() && Auth::user()->user_mode == "gold")
                                    <a href="#profile" class="nav-link text-warning">
                                        @if(Auth::user()->name == "")
                                            {{ Auth::user()->mobile }}
                                        @elseif(Auth::user()->name !== "")
                                            {{ Auth::user()->name }}
                                        @endif
                                        <span class="fa fa-diamond font-16 text-warning pl-1"></span></a>
                                @else
                                    <a href="#profile"
                                       class="nav-link">
                                        @if(Auth::user()->name == "")
                                            {{ Auth::user()->mobile }}
                                        @elseif(Auth::user()->name !== "")
                                            {{ Auth::user()->name }}
                                        @endif
                                    </a>
                                @endif
                                <ul class="dropdown text-right rtl">
                                    <li><a class="nav-link text-success">
                                            اعتبار {{ number_format(Auth::user()->credit) }} ریال </a></li>
                                    @if(Auth::check() && Auth::user()->role == "admin")
                                        <li><a href="{{ route("tahator") }}" class="nav-link">پنل مدیریت</a></li>
                                    @endif
                                    <li><a href="{{ route("profile_index") }}" class="nav-link">پروفایل</a></li>
                                    <li><a href="{{ route("logout") }}" class="nav-link">خروج</a></li>
                                </ul>
                            </li>
                        @endif
                        <li><a href="{{ route("contact") }}" class="nav-link">تماس با ما</a></li>
                        <li><a href="{{ route("About_Us") }}" class="nav-link">درباره ما</a></li>
                        <li class="has-children"><a href="#contact-section" class="nav-link">خدمات ما</a>
                            <ul class="dropdown text-right">
                                <li><a href="#" class="nav-link">پلاگین وردپرس</a></li>
                                <li><a href="#" class="nav-link">فروش وب سایت اختصاصی</a></li>
                                <li><a href="#" class="nav-link">فروش اپلیکیشن</a></li>
                                <li><a href="#" class="nav-link">وب سایت های رایگان</a></li>
                                <li><a href="#" class="nav-link">مشارکت در پروژه</a></li>
                                <li><a href="#" class="nav-link">سرمایه گذاری در پروژه</a></li>
                                <li><a href="#" class="nav-link">مشارکت برنامه نویسان</a></li>
                                <li><a href="#" class="nav-link">خبرنامه</a></li>
                            </ul>
                        </li>
                        <li><a href="/" class="nav-link pr-0">صفحه اصلی<i class="fa fa-home font-19 fa-lg d-none d-sm-inline pl-2 text-primary"></i></a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-4 col-md-8 d-inline-block d-xl-none ml-md-0 py-2" style="position: relative; top: 3px;"><a
                        href="#" class="site-menu-toggle js-menu-toggle float-right"><span
                            class="icon-menu h3 fa-2x"></span></a></div>

        </div>
    </div>
</header>


