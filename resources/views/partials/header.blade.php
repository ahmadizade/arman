<!-- Start Top Header Area -->
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <ul class="top-header-contact-info">
                    <li><i class="bx bx-phone-call"></i> <a href="tel:+1234567898">021-۸۸۵۵5457</a></li>
                    <li><i class="bx bx-map"></i> <a href="#" target="_blank">تهران، خیابان بخارست، کوچه پنجم، پلاک ۱۵</a></li>
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
                                        {{ Auth::user()->name ?? "" }} {{ Auth::user()->family ?? "" }}
                                    @endif
                                    <i class="bx bx-chevron-down"></i>
                                </span>
                            </button>

                            <div class="dropdown-menu">
                                @if(Auth::check() && Auth::user()->role == "admin")
                                    <a href="{{route('armanmask')}}" class="dropdown-item">پنل مدیریت </a>
                                @endif
                                <a href="{{ route("profile_index") }}" class="dropdown-item">پروفایل کاربری </a>
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
                <a class="navbar-brand" href="{{route('home')}}">
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

                                            @if(isset($allProduct))
                                            <div class="col">
                                                <h6 class="submenu-title">محصولات</h6>
                                                <ul class="megamenu-submenu">
                                                    @foreach($allProduct as $item)
                                                        <li><a href="{{ route("single_product",["slug" => $item->product_slug]) }}">{{$item->product_name ?? ""}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif

                                            @if(isset($popularity))
                                                <div class="col">
                                                    <h6 class="submenu-title">پربازدید‌ترین‌ها</h6>
                                                    <ul class="megamenu-submenu">
                                                        @foreach($popularity as $item)
                                                            <li><a href="{{ route("single_product",["slug" => $item->product_slug]) }}">{{$item->product_name ?? ""}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if(isset($category))
                                                <div class="col">
                                                    <h6 class="submenu-title">دسته بندی ها</h6>
                                                    <ul class="megamenu-submenu">
                                                        @foreach($category as $item)
                                                            <li><a href="{{route('single_category',["slug" => $item->slug])}}">{{$item->name ?? ""}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

{{--                                            <div class="col">--}}
{{--                                                    <ul class="megamenu-submenu">--}}
{{--                                                        <li>--}}
{{--                                                            <div class="aside-trending-products">--}}
{{--                                                                    <img src="/img/navbar/navbar-img1.png" alt="تصویر">--}}
{{--                                                                <div class="category">--}}
{{--                                                                    <h4>ماسک پزشکی</h4>--}}
{{--                                                                </div>--}}

{{--                                                            </div>--}}

{{--                                                            <div class="aside-trending-products">--}}
{{--                                                                    <img src="/img/navbar/navbar-img2.png" alt="تصویر">--}}

{{--                                                                <div class="category">--}}
{{--                                                                    <h4>ماسک سه لایه</h4>--}}
{{--                                                                </div>--}}


{{--                                                            </div>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}

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

