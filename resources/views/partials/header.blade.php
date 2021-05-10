<!-- Start header -->
<header class="main-header">
    <!-- Start ads -->
    <div class="ads-header-wrapper">
        <a href="{{route('home')}}" class="ads-header hidden-sm" target="_blank"
           style="background-image: url(/img/banner/large-ads.jpg)"></a>
    </div>
    <!-- End ads -->
    <!-- Start topbar -->
    <div class="container main-container">
        <div class="topbar dt-sl">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="logo-area">
                        <a href="{{route('home')}}">
                            <img src="/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 hidden-sm">
                    <div class="search-area dt-sl">
                        <form action="" class="search">
                            <input type="text"
                                   placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                            <i class="far fa-search search-icon"></i>
                            <button class="close-search-result" type="button"><i
                                    class="mdi mdi-close"></i></button>
                            <div class="search-result">
                                <ul>
                                    <li>
                                        <a href="{{route('home')}}">موبایل</a>
                                    </li>
                                    <li>
                                        <a href="{{route('home')}}">مد و پوشاک</a>
                                    </li>
                                    <li>
                                        <a href="{{route('home')}}">میکروفن</a>
                                    </li>
                                    <li>
                                        <a href="{{route('home')}}">میز تلویزیون</a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-6 topbar-left">
                    <ul class="nav float-left">
                        @if(!Auth::check())
                            <li class="nav-item account dropdown">
                                <a class="nav-link" href="{{route('register')}}">
                                    <span class="label-dropdown">حساب کاربری</span>
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </a>
                            </li>
                        @else
                            <li class="nav-item account dropdown">
                                    <a class="nav-link" href="{{route('home')}}" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                    <span class="label-dropdown">
                                        @if(Auth::user()->name == "")
                                            {{ Auth::user()->mobile }}
                                        @elseif(Auth::user()->name !== "")
                                            {{ Auth::user()->name }}
                                        @endif
                                    </span>
                                        <i class="mdi mdi-account-circle-outline"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                        <a class="dropdown-item" href="{{route('home')}}">
                                            <i class="mdi mdi-account-card-details-outline"></i>پروفایل
                                        </a>
                                        <a class="dropdown-item" href="{{route('home')}}">
                                            <span class="float-left badge badge-dark">۴</span>
                                            <i class="mdi mdi-comment-text-outline"></i>پیغام ها
                                        </a>
                                        <a class="dropdown-item" href="{{route('home')}}">
                                            <i class="mdi mdi-account-edit-outline"></i>ویرایش حساب کاربری
                                        </a>
                                        <div class="dropdown-divider" role="presentation"></div>
                                        <a class="dropdown-item" href="{{route('logout')}}">
                                            <i class="mdi mdi-logout-variant"></i>خروج
                                        </a>
                                    </div>
                                </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End topbar -->

    <!-- Start bottom-header -->
    <div class="bottom-header dt-sl mb-sm-bottom-header">
        <div class="container main-container">
            <!-- Start Main-Menu -->
            <nav class="main-menu d-flex justify-content-md-between justify-content-end dt-sl">
                <ul class="list hidden-sm">
                    <!-- mega menu 2 column -->
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-2">
                        <a class="nav-link" href="{{route('home')}}">کالای دیجیتال</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو هفت</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- mega menu 3 column -->
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-3">
                        <a class="nav-link" href="{{route('home')}}">بهداشت و سلامت</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو هفت</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            زیر منو شش</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            زیر منو هفت</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item">
                                <a href="{{route('home')}}">
                                    <img src="/img/theme/mega-menu.jpg" alt="">
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- mega menu 4 column -->
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-4">
                        <a class="nav-link" href="{{route('home')}}">ابزار و اداری</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو هفت</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو هشت</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو نه</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو هفت</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- mega menu 5 column -->
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-5">
                        <a class="nav-link" href="">مد و پوشاک</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو هفت</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو هشت</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو نه</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو هفت</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو شش</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">عنوان دسته</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو چهار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو پنج</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- dropdown-menu -->
                    <li class="list-item list-item-has-children menu-col-1">
                        <a class="nav-link" href="{{route('home')}}">خانه و آشپزخانه</a>
                        <ul class="sub-menu nav">
                            <li class="list-item">
                                <a class="nav-link" href="{{route('home')}}">زیر منو یک</a>
                            </li>
                            <li class="list-item">
                                <a class="nav-link" href="{{route('home')}}">زیر منو دو</a>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">زیر منو سه</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه - یک</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه - دو</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">زیر منو سه - سه</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="list-item">
                        <a class="nav-link" href="{{route('home')}}">ورزش و سفر</a>
                    </li>
                </ul>
                <div class="nav">
                    <div class="nav-item cart--wrapper">
                        <a class="nav-link" href="{{route('home')}}">
                            <span class="label-dropdown">سبد خرید</span>
                            <i class="mdi mdi-cart-outline"></i>
                            @if(!empty(Illuminate\Support\Facades\Session::has('product') && count(Illuminate\Support\Facades\Session::get('product')) > 0))
                                <span class="count">
                                    {{count(Illuminate\Support\Facades\Session::get('product'))}}
                                </span>
                            @else
                                <span class="count">0</span>
                            @endif
                        </a>
                        <div class="header-cart-info">
                            <div class="header-cart-info-header">
                                <div class="header-cart-info-count">
                                    3 کالا
                                </div>
                                <a href="{{route('home')}}" class="header-cart-info-link">
                                    <span>مشاهده سبد خرید</span>
                                </a>
                            </div>
                            <ul class="header-basket-list do-nice-scroll">
                                <li class="cart-item">
                                    <a href="{{route('home')}}" class="header-basket-list-item">
                                        <div class="header-basket-list-item-image">
                                            <img src="/img/cart/1.jpg" alt="">
                                        </div>
                                        <div class="header-basket-list-item-content">
                                            <p class="header-basket-list-item-title">
                                                گوشی موبایل سامسونگ مدل Galaxy A30 SM-A305F/DS دو سیم کارت ظرفیت
                                                64 گیگابایت
                                            </p>
                                            <div class="header-basket-list-item-footer">
                                                <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                    <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #2196f3"></div>
                                                                آبی
                                                            </span>
                                                </div>
                                                <button class="header-basket-list-item-remove">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="cart-item">
                                    <a href="{{route('home')}}" class="header-basket-list-item">
                                        <div class="header-basket-list-item-image">
                                            <img src="/img/cart/2.jpg" alt="">
                                        </div>
                                        <div class="header-basket-list-item-content">
                                            <p class="header-basket-list-item-title">
                                                گوشی موبایل هوآوی مدل Y9 2019 JKM-LX1 دو سیم کارت ظرفیت 64
                                                گیگابایت
                                            </p>
                                            <div class="header-basket-list-item-footer">
                                                <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                    <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #212121"></div>
                                                                سفید
                                                            </span>
                                                </div>
                                                <button class="header-basket-list-item-remove">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="cart-item">
                                    <a href="{{route('home')}}" class="header-basket-list-item">
                                        <div class="header-basket-list-item-image">
                                            <img src="/img/cart/3.jpg" alt="">
                                        </div>
                                        <div class="header-basket-list-item-content">
                                            <p class="header-basket-list-item-title">
                                                گوشی موبایل سامسونگ مدل Galaxy A70 SM-A705FN/DS دو سیم‌کارت
                                                ظرفیت 128 گیگابایت
                                            </p>
                                            <div class="header-basket-list-item-footer">
                                                <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                    <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #FFFFFF"></div>
                                                                سفید
                                                            </span>
                                                </div>
                                                <button class="header-basket-list-item-remove">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="header-cart-info-footer">
                                <div class="header-cart-info-total">
                                    <span class="header-cart-info-total-text">مبلغ قابل پرداخت:</span>
                                    <p class="header-cart-info-total-amount">
                                                <span class="header-cart-info-total-amount-number">
                                                    9,500,000 <span>تومان</span></span>
                                    </p>
                                </div>

                                <div>
                                    <a href="{{route('home')}}" class="header-cart-info-submit">
                                        ثبت سفارش
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn-menu">
                    <div class="align align__justify">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="side-menu">
                    <div class="logo-nav-res dt-sl text-center">
                        <a href="{{route('home')}}">
                            <img src="/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="search-box-side-menu dt-sl text-center mt-2 mb-3">
                        <form action="">
                            <input type="text" name="s" placeholder="جستجو کنید...">
                            <i class="mdi mdi-magnify"></i>
                        </form>
                    </div>
                    <ul class="navbar-nav dt-sl">
                        <li class="sub-menu">
                            <a href="{{route('home')}}">کالای دیجیتال</a>
                            <ul>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                </li>
                                <li>
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                </li>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{route('home')}}">بهداشت و سلامت</a>
                            <ul>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                </li>
                                <li>
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                </li>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{route('home')}}">ابزار و اداری</a>
                            <ul>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                </li>
                                <li>
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                </li>
                                <li class="sub-menu">
                                    <a href="{{route('home')}}">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('home')}}">مد و پوشاک</a>
                        </li>
                        <li>
                            <a href="{{route('home')}}">خانه و آشپزخانه</a>
                        </li>
                        <li>
                            <a href="{{route('home')}}">ورزش و سفر</a>
                        </li>
                    </ul>
                </div>
                <div class="overlay-side-menu">
                </div>
            </nav>
            <!-- End Main-Menu -->
        </div>
    </div>
    <!-- End bottom-header -->
</header>
<!-- End header -->
