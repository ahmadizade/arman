<!-- Start Top Header Area -->
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <ul class="top-header-contact-info">
                    <li><i class="bx bx-phone-call"></i> <a href="tel:+1234567898">021-7898322</a></li>
                    <li><i class="bx bx-map"></i> <a href="#" target="_blank">تهران - فاطمی</a></li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-5">
                <ul class="top-header-menu">
                    @if(!Auth::check())

                    <li><a href="{{route('login')}}">ورود / ثبت نام</a></li>


                    @else

                    <li>
                        <div class="dropdown currency-switcher d-inline-block">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>
                                    @if(Auth::user()->name == "")
                                        {{ Auth::user()->mobile }}
                                    @elseif(Auth::user()->name !== "")
                                        {{ Auth::user()->name }}
                                    @endif
                                    <i class="bx bx-chevron-down"></i>
                                </span>
                            </button>

                            <div class="dropdown-menu">
                                @if(Auth::check() && Auth::user()->role == "admin")
                                    <a href="{{route('cioce')}}" class="dropdown-item">پنل مدیریت </a>
                                @endif
                                <a href="{{ route("profile_credit") }}" class="dropdown-item">کیف پول من </a>
                                <a href="{{route('logout')}}" class="dropdown-item text-danger">خروج</a>
                            </div>
                        </div>
                    </li>

                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Top Header Area -->

<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="drodo-responsive-nav">
        <div class="container">
            <div class="drodo-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img src="/img/logo.png" alt="لوگو">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="drodo-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="/img/logo.png" alt="لوگو">
                </a>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{route('home')}}" class="nav-link active"><i class="bx bx-home"></i> خانه</a></li>

                        <li class="nav-item megamenu"><a href="#" class="nav-link">محصولات <i class="bx bx-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="submenu-title">سبک های خرید</h6>

                                                <ul class="megamenu-submenu">
                                                    <li><a href="products-left-sidebar.html">نوار کناری سمت چپ</a></li>

                                                    <li><a href="products-left-sidebar-with-categories.html">نوار کناری سمت چپ با دسته ها</a></li>

                                                    <li><a href="products-right-sidebar.html">نوار کناری سمت راست</a></li>

                                                    <li><a href="products-right-sidebar-with-categories.html">نوار کناری سمت راست با دسته ها</a></li>

                                                    <li><a href="products-without-sidebar.html">بدون نوار کناری</a></li>

                                                    <li><a href="products-left-sidebar-fullwidth.html">با عرض نوار کناری سمت چپ</a></li>

                                                    <li><a href="products-right-sidebar-fullwidth.html">با نوار کناری سمت راست پهنای باند</a></li>
                                                </ul>
                                            </div>

                                            <div class="col">
                                                <h6 class="submenu-title">سبک های خرید 2</h6>

                                                <ul class="megamenu-submenu">
                                                    <li><a href="products-left-sidebar.html">نوار کناری سمت چپ</a></li>

                                                    <li><a href="products-left-sidebar-with-categories.html">نوار کناری سمت چپ با دسته ها</a></li>

                                                    <li><a href="products-right-sidebar.html">نوار کناری سمت راست</a></li>

                                                    <li><a href="products-right-sidebar-with-categories.html">نوار کناری سمت راست با دسته ها</a></li>

                                                    <li><a href="products-without-sidebar.html">بدون نوار کناری</a></li>

                                                    <li><a href="products-left-sidebar-fullwidth.html">با عرض نوار کناری سمت چپ</a></li>

                                                    <li><a href="products-right-sidebar-fullwidth.html">با نوار کناری سمت راست پهنای باند</a></li>
                                                </ul>
                                            </div>

                                            <div class="col">
                                                <h6 class="submenu-title">سبک های خرید 3</h6>

                                                <ul class="megamenu-submenu">
                                                    <li><a href="products-left-sidebar.html">نوار کناری سمت چپ</a></li>

                                                    <li><a href="products-left-sidebar-with-categories.html">نوار کناری سمت چپ با دسته ها</a></li>

                                                    <li><a href="products-right-sidebar.html">نوار کناری سمت راست</a></li>

                                                    <li><a href="products-right-sidebar-with-categories.html">نوار کناری سمت راست با دسته ها</a></li>

                                                    <li><a href="products-without-sidebar.html">بدون نوار کناری</a></li>

                                                    <li><a href="products-left-sidebar-fullwidth.html">با عرض نوار کناری سمت چپ</a></li>

                                                    <li><a href="products-right-sidebar-fullwidth.html">با نوار کناری سمت راست پهنای باند</a></li>
                                                </ul>
                                            </div>

                                            <div class="col">
                                                <h6 class="submenu-title">صفحات محصول</h6>

                                                <ul class="megamenu-submenu">
                                                    <li><a href="single-products-1.html">سبک پیش فرض</a></li>

                                                    <li><a href="single-products-2.html">محصول تنها</a></li>

                                                    <li><a href="single-products-3.html">سبک شبکه</a></li>

                                                    <li><a href="single-products-4.html">جزئیات مهم</a></li>

                                                    <li><a href="single-products-5.html">تصویر کشویی</a></li>

                                                    <li><a href="cart.html">سبد خرید</a></li>

                                                    <li><a href="checkout.html">پرداخت</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item"><a href="{{route('mag')}}" class="nav-link">وبلاگ</a></li>

                        <li class="nav-item"><a href="{{route('about_Us')}}" class="nav-link">درباره ما</a></li>

                        <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">تماس با ما</a></li>
                    </ul>

                    <div class="others-option">
                        <div class="option-item">
                            <div class="wishlist-btn">
                                <a href="#" data-toggle="modal" data-target="#shoppingWishlistModal"><i class="bx bx-heart"></i></a>
                            </div>
                        </div>

                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="#" data-toggle="modal" data-target="#shoppingCartModal">
                                    <i class="bx bx-shopping-bag"></i>
                                    @if(!empty(Illuminate\Support\Facades\Session::has('product') && count(Illuminate\Support\Facades\Session::get('product')) > 0))
                                    <span>
                                    {{count(Illuminate\Support\Facades\Session::get('product'))}}
                                    </span>
                                    @else
                                        <span>0</span>
                                    @endif
                                </a>
                            </div>
                        </div>

                        <div class="option-item">
                            <div class="search-btn-box">
                                <i class="search-btn bx bx-search-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Start Search Overlay -->
<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>

            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>

            <div class="search-overlay-form">
                <form>
                    <input type="text" class="input-search" placeholder="اینجا را جستجو کنید ...">
                    <button type="submit"><i class="bx bx-search-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Search Overlay -->

