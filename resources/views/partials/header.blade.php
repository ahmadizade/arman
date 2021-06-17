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
                                        <a class="dropdown-item" href="{{route('profile_index')}}">
                                            <i class="mdi mdi-account-card-details-outline"></i>پروفایل کاربری
                                        </a>
                                        @if(Auth::check() && Auth::user()->role == "admin")
                                            <a class="dropdown-item" href="{{route('cioce')}}">
                                                <i class="mdi mdi-account-card-details-outline"></i>پنل مدیریت
                                            </a>
                                        @endif
{{--                                        <a class="dropdown-item" href="{{route('home')}}">--}}
{{--                                            <span class="float-left badge badge-dark">۴</span>--}}
{{--                                            <i class="mdi mdi-comment-text-outline"></i>پیغام ها--}}
{{--                                        </a>--}}
                                        <a class="dropdown-item" href="{{ route("profile_edit") }}">
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
                        <a class="nav-link" href="{{route('home')}}">پرفروش ترین‌ها</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">محصولات ایرانی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">ربات قیمت گذار</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">وب سرویس محصولات</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">وب سرویس محصولات شبکه</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">وب سرویس تور و هواپیمایی</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">ربات تولید محتوا</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">تاریخ و ساعت شمسی</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">وب سایت آماده</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">فروشگاه VipTip</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">فروشگاه تمشکی</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">فروشگاه تهاتری</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">Laravel Script</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">Jquery Script</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">اسکریپت محاسبه سن</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">اسپریپت محاسبه BMI</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- mega menu 3 column -->
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-3">
                        <a class="nav-link" href="{{route('home')}}">دیتابیس</a>
                        <ul class="sub-menu nav">
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">فارسی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">تیبل محصولات</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">تیبل کاربر</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">تیبل آدرس</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">تیبل دسته بندی</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">تیبل پروفایل</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">چند منظوره</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">فروشگاهی</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">انگلیسی</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            تیبل کاربر</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            تیبل آدرس</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            تیبل دسته بندی</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            تیبل پروفایل</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            چند‌منظوره</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            فروشگاهی</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}"><i class="mdi mdi-brightness-percent"></i>
                                            خبری</a>
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
                    <li class="list-item list-item-has-children menu-col-1">
                        <a class="nav-link" href="{{route('home')}}">لاراول</a>
                        <ul class="sub-menu nav">
                            <li class="list-item">
                                <a class="nav-link" href="{{route('home')}}">وب سایت کامل</a>
                            </li>
                            <li class="list-item">
                                <a class="nav-link" href="{{route('home')}}">اسکریپت آماده</a>
                            </li>
                            <li class="list-item list-item-has-children">
                                <a class="nav-link" href="{{route('home')}}">آموزش</a>
                                <ul class="sub-menu nav">
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">وب پک کامل</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">جاوا اسکریپت</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">PHP 7.4</a>
                                    </li>
                                    <li class="list-item">
                                        <a class="nav-link" href="{{route('home')}}">لاراول</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="list-item">
                        <a class="nav-link" href="{{route('seo')}}">مشاوره سئو</a>
                    </li>
{{--                    <li class="list-item">--}}
{{--                        <a class="nav-link" href="{{route('home')}}">مشاوره SEO</a>--}}
{{--                    </li>--}}
                    <li class="list-item">
                        <a class="nav-link" href="{{route('contact')}}">تماس با ما</a>
                    </li>
                </ul>
                <div class="nav">
                    <div class="nav-item cart--wrapper">
                        <a class="nav-link" href="javascript:void(0)">
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
                        @if(!empty(Illuminate\Support\Facades\Session::has('product') && count(Illuminate\Support\Facades\Session::get('product')) > 0))
                            <div class="header-cart-info">
                            <div class="header-cart-info-header">
                                <div class="header-cart-info-count">
                                    {{count(Illuminate\Support\Facades\Session::get('product'))}} کالا
                                </div>
                                <a href="{{route('cart_page')}}" class="header-cart-info-link">
                                    <span>مشاهده سبد خرید</span>
                                </a>
                            </div>
                            <ul class="header-basket-list do-nice-scroll">
                                @foreach(Illuminate\Support\Facades\Session::get('product') as $key=>$item)
                                    <li class="cart-item">
                                        <a href="{{route('home')}}" class="header-basket-list-item">
                                        <div class="header-basket-list-item-image">
                                            <img src="/uploads/thumbnail/{{$item->thumbnail}}" alt="{{$item->product_name}}">
                                        </div>
                                        <div class="header-basket-list-item-content">
                                            <p class="header-basket-list-item-title">
                                                {{$item->product_name}}
                                            </p>
                                            <div class="header-basket-list-item-footer">
                                                <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                قیمت :
                                                            </span>
                                                    <span class="header-basket-list-item-props-item">
                                                        {{number_format($item->price)}} تومان
                                                    </span>
                                                </div>
                                                <button class="header-basket-list-item-remove">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="header-cart-info-footer">
                                <div class="header-cart-info-total">
                                    <span class="header-cart-info-total-text">مبلغ قابل پرداخت:</span>
                                    @foreach(Illuminate\Support\Facades\Session::get('product') as $key => $item)
                                        <p class="header-cart-info-total-amount">
                                            <span class="header-cart-info-total-amount-number"> {{$item->price}} <span>تومان</span></span>
                                        </p>
                                    @endforeach
                                </div>

                                <div>
                                    <a href="{{route('cart_page')}}" class="header-cart-info-submit">
                                        ثبت سفارش
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
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
